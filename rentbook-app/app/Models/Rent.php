<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'lease_term',
        'bait',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

//    public function tenant()
//    {
//        return $this->hasMany(Tenant::class);
//    }
}
