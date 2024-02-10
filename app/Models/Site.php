<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        // if tags then need to filter by tags else nothings --> get all
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        };

        if ($filters['search'] ?? false) {
            $query->where('site_name', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        };
    }

    // protected $fillable = ['user_id', 'design_template_id', 'color_id', 'site_name'];
}
