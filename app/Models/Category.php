<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Definir la tabla que corresponde al modelo
    protected $table = 'categories';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['name', 'image'];

    /**
     * Relación con los libros
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
