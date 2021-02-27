<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::addSelect(['rentdate' => Rent::select('lease_term')
            ->whereColumn('book_id', 'books.id')
            ->orderBy('lease_term', 'desc')
            ->limit(20)
        ])
            ->get();; // return all
        return view('home', [
            'books' => $books
        ]);
    }
}
