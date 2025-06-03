<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Definir la tabla que corresponde al modelo
    protected $table = 'books';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['code', 'quantity', 'title', 'author', 'editorial', 'year', 'category_id'];

    /**
     * Relación con la categoría
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
