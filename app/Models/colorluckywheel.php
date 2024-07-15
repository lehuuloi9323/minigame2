<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colorluckywheel extends Model
{
    use HasFactory;
    protected $fillable = ['color_background', 'color_title', 'color_tab1', 'color_tab2', 'color_pointer', 'color_center', 'color_border'];
}
