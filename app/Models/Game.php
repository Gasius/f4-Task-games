<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model
{
    use HasFactory;

    /**
     * Атрибуты, которые можно массово назначать.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'genre',
        'image',
        'specification',
        'status'
    ];


    /**
     * Local Scope для получения только доступных игр.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('status', 'available');
    }
}

