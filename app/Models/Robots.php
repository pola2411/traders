<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robots extends Model
{
    use HasFactory;

    protected $table = "robots";
    public $timestamps = false;
}
