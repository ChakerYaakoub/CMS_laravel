<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'is_public', 'is_accepted', 'site_title',
        'link', 'introduction', 'logo', 'tags', 'BasicImage', 'design_template_id', 'color_id', 'site_builder'
    ];







    public function scopeFilter($query, array $filters)
    {
        // if tags then need to filter by tags else nothings --> get all
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        };

        if ($filters['search'] ?? false) {
            $query->where('site_title', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('introduction', 'like', '%' . request('search') . '%')
                ->orWhere('site_builder', 'like', '%' . request('search') . '%');
        };
    }
}
