<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()
            ->posts()
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'unique:posts', 'max:200'],
            'image' => ['nullable', 'mimes:jpg,jpeg,bmp,png', 'max:500'],
            'content' => 'nullable',
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        if ($request->file('image')) {
            $image_path = Storage::put('post_images', $request->file('image'));
            $validated['image'] = $image_path;
        }

        $validated['user_id'] = Auth::id();

        $post = Post::create($validated);

        if ($request->has('tags')) {
            $request->validate([
                'tags' => ['nullable', 'exists:tags,id'],
            ]);
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        if (Auth::id() === $post->user_id) {
            return view(
                'admin.posts.edit',
                compact('post', 'categories', 'tags')
            );
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::id() === $post->user_id) {
            $validated = $request->validate([
                'title' => [
                    'required',
                    Rule::unique('posts')->ignore($post->id),
                    'max:200',
                ],
                'image' => ['nullable', 'mimes:jpg,jpeg,bmp,png', 'max:500'],
                'content' => 'nullable',
                'category_id' => ['nullable', 'exists:categories,id'],
            ]);

            if ($request->file('image')) {
                Storage::delete($post->image);
                $image_path = Storage::put(
                    'post_images',
                    $request->file('image')
                );
                $validated['image'] = $image_path;
            }

            $post->update($validated);

            if ($request->has('tags')) {
                $request->validate([
                    'tags' => ['nullable', 'exists:tags,id'],
                ]);
                $post->tags()->sync($request->tags);
            }

            return redirect()
                ->route('admin.posts.index')
                ->with('message', 'The post has been correctly updated!');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::id() === $post->user_id) {
            $post->delete();
            return redirect()
                ->route('admin.posts.index')
                ->with('message', 'The post has been correctly removed!');
        } else {
            abort(403);
        }
    }
}