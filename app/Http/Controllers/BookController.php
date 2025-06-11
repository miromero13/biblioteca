<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory; // Importar Subcategory
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todas las categorías
        $categories = Category::all();

        // Obtener todas las subcategorías (para el formulario de agregar libro/categoría)
        $subcategories = Subcategory::all();

        // Lógica de búsqueda para la página 'home'
        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $books = Book::where('title', 'like', '%' . $searchTerm . '%')
                         ->orWhere('author', 'like', '%' . $searchTerm . '%')
                         ->orWhere('editorial', 'like', '%' . $searchTerm . '%')
                         ->orWhere('code', 'like', '%' . $searchTerm . '%')
                         ->with('subcategory.category')
                         ->get();
        } else {
            // Si no hay término de búsqueda, inicializar $books como una colección vacía
            // para que no se listen por defecto, como lo pediste anteriormente.
            $books = collect();
        }

        // Contar el total de libros y categorías
        $totalBooks = Book::sum('quantity');
        $totalCategories = Category::count();
        $totalSubcategories = Subcategory::count(); // Nuevo contador

        // Retornar la vista 'home'
        return view('home', compact('categories', 'subcategories', 'books', 'totalBooks', 'totalCategories', 'totalSubcategories', 'searchTerm'));
    }

    public function showCategorySubcategories($id)
    {
        // Obtener la categoría seleccionada
        $category = Category::findOrFail($id);

        // Obtener las subcategorías que pertenecen a esa categoría
        $subcategories = Subcategory::where('category_id', $id)->get();

        // Retornar la vista con las subcategorías
        return view('category-subcategories', compact('category', 'subcategories'));
    }

    public function showSubcategoryBooks(Request $request, $id)
    {
        // Obtener la subcategoría seleccionada
        $subcategory = Subcategory::findOrFail($id);

        // Obtener el término de búsqueda de la solicitud
        $searchTerm = $request->input('search');

        // Construir la consulta para los libros que pertenecen a esa subcategoría
        $query = Book::where('subcategory_id', $id);

        // Si hay un término de búsqueda, aplica los filtros adicionales
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('author', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('editorial', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('code', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Ejecutar la consulta y obtener los libros
        $books = $query->get();

        // Retornar la vista 'subcategory-books' con la subcategoría, los libros filtrados y el término de búsqueda
        return view('subcategory-books', compact('subcategory', 'books', 'searchTerm'));
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:books,code', // Asegurar que el código sea único
            'quantity' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'year' => 'required|integer|digits:4',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        Book::create($request->all());

        return redirect()->route('home')->with('success', 'Libro agregado exitosamente.');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'image' => 'required|url',
        ]);

        Category::create([
            'name' => $request->name,
            'image' => $request->image,
        ]);

        return redirect()->route('home')->with('success', 'Categoría agregada exitosamente.');
    }

    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:subcategories,name,NULL,id,category_id,'.$request->category_id, // Única por categoría
        ]);

        Subcategory::create($request->all());

        return redirect()->route('home')->with('success', 'Subcategoría agregada exitosamente.');
    }
}