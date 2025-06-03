<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías
        $categories = Category::all();
        
        // Obtener todos los libros
        $books = Book::with('category')->get();
        
        // Contar el total de libros y categorías
        $totalBooks = Book::sum('quantity');
        $totalCategories = Category::count();

        // Retornar la vista
        return view('home', compact('categories', 'books', 'totalBooks', 'totalCategories'));
    }

    public function showCategoryBooks($id)
    {
        // Obtener la categoría seleccionada
        $category = Category::findOrFail($id);

        // Obtener los libros que pertenecen a esa categoría
        $books = Book::where('category_id', $id)->get();

        // Retornar la vista
        return view('category-books', compact('category', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'quantity' => 'required|integer',
            'title' => 'required',
            'author' => 'required',
            'editorial' => 'required',
            'year' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Crear un nuevo libro
        Book::create($request->all());

        // Redirigir al home
        return redirect()->route('home');
    }

    public function storeCategory(Request $request)
    {
        // Validar los datos (la URL de la imagen debe ser una URL válida)
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url', // Validamos que la entrada sea una URL válida
        ]);

        // Crear la categoría con la URL de la imagen proporcionada
        Category::create([
            'name' => $request->name,
            'image' => $request->image, // Guardamos la URL de la imagen
        ]);

        // Redirigir al home después de guardar la categoría
        return redirect()->route('home');
    }
}
