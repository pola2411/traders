<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperacionesTrader extends Model
{
    use HasFactory;

    protected $table = "operaciones_traders";
    public $timestamps = false;
}
