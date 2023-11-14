<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardType extends Model
{
    use HasFactory;

    protected $table = "dashboard";
    public $timestamps = false;
}
