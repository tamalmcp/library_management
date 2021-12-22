<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequisition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id', 'user_id', 'requisition_date', 'return_date', 'note', 'status'
    ];

    /**
     * Get book.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get book.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
