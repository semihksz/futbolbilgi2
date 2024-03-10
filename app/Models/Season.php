<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;

class Season extends Model
{
    use HasFactory;
    protected $fillable = [
        'season_date',
        'slug',
        'created_by',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('season_date')
            ->saveSlugsTo('slug');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->season_date);
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
