<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function posts(Category $category)
    {
        $posts = $category
            ->posts()
            ->orderByDesc('id')
            ->paginate(10);
        return view('guest.categories.posts', compact('posts', 'category'));
    }
}