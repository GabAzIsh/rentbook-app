<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
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
        list($request->book, $request->cost) = explode('@', $request->book);
        $this->validate($request, [
            'book' => 'required',
            'tenant' => 'required',
            'count' => 'required|numeric|min:0|not_in:0',
            'leaseterm' => 'required',
            'bail' => ['required', new TooLittleMoney((int)$request->cost, (int)$request->count)],
        ]);
//        dd((int)$request->book, (int)$request->tenant, $request->count, $request->leaseterm, $request->bail);
//        Rent::create([
//            'book_id' => (int)$request->book,
//            'tenant_id' => (int)$request->tenant,
//            'count' => $request->count,
//            'lease_term' =>$request->leaseterm,
//            'bait' => $request->bail,
//        ]);

        $rent = new Rent;
            $rent->book_id = (int)$request->book;
            $rent->tenant_id = (int)$request->tenant;
            $rent->count =  $request->count;
            $rent->lease_term = $request->leaseterm;
            $rent->bait = $request->bail;
            $rent->save();




        return redirect()->route('home');
    }
}
