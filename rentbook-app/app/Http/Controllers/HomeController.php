<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $data = DB::table('books')->join('rents', 'books.id', '=', 'rents.book_id')->get();

//        dd($data);
        return view('home', [
            'books' => $data,
        ]);
    }
}
