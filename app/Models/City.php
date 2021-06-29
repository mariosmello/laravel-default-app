<?php

namespace App\Models;

use App\Helpers\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class City extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name', 'slug', 'state_id'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function scopeFilterStateBySlug($query, $slug)
    {
        return $query->when($slug, function ($query) use ($slug) {
             $query->whereHas('state', function (Builder $query) use ($slug)  {
                 $query->where('slug', $slug);
             });
        });
    }

}
