<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['template_type'];
}
