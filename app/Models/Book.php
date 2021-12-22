<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'author_id', 'title', 'description', 'status'
    ];

    /**
     * Get book category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get book category.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
