<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'content', 'category_id'];

    public function categoty(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}