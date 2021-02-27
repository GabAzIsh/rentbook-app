<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Tenant;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        return view('getrent', [
            'books' => Book::all(),
            'tenants' => Tenant::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));
        return back();
    }
}
