<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_book';
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'id_category',
        'stock'
    ];

    // Relasi: buku milik satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }

    // Relasi: buku bisa dipinjam banyak kali
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class, 'id_book', 'id_book');
    }
}
