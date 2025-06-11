<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = ['code', 'quantity', 'title', 'author', 'editorial', 'year', 'subcategory_id'];

    /**
     * Relación con la subcategoría
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}