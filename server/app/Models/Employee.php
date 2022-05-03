<?php

namespace App\Models;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, Orderable;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'status',
        'created_date',
        'sex',
        'salary'
    ];

//    protected function sex() : Attribute
//    {
//        return \Attribute::make(
//            get: fn ($value) => {}
//        );
//    }
}
