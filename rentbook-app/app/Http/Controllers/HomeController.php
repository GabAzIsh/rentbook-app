<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('name', 'desc')
            ->take(20)
            ->get();; // return all
        return view('home', [
            'books' => $books
        ]);
    }
}
