<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitorPrice extends Model
{
    use HasFactory;

    protected $table = "monitor";
    public $timestamps = false;
}
