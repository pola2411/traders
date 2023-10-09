<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortafolioGraph extends Model
{
    use HasFactory;

    protected $table = "grafica_portafolios";
    public $timestamps = false;
}
