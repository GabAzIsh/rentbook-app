<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $data = DB::table('books')
          ->join('rents', 'books.id', '=', 'rents.book_id')
          ->orderBy('rents.created_at', 'desc')
          ->get();

        return view('home', [
            'books' => $data,
        ]);




    }
}
