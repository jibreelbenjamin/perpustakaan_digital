<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_borrowing';
    protected $fillable = [
        'id_user',
        'id_book',
        'borrow_date',
        'return_date',
        'status'
    ];

    // Relasi: peminjaman dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi: peminjaman untuk satu buku
    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id_book');
    }
}
