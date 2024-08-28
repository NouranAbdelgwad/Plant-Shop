<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name',
        'image_1',
        'price',
        'category',
        'description'
    ];
    protected $table = "plants";
    use HasFactory;
}
