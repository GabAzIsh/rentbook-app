<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Tenant;
use App\Rules\TooLittleMoney;
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
            'book' => 'required',
            'tenant' => 'required',
            'count' => 'required|numeric|min:0|not_in:0',
            'lease_term' => 'required',
            'bail' => ['required', 'numeric', new TooLittleMoney($request->cost, $request->count)]
        ]);

        $request->user()->posts()->create($request->only('body'));
        return back();
    }
}
