<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Parts extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'name',
        'quantity',
    ];
}
