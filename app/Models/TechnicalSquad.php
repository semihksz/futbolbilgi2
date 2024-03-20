<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechnicalSquad extends Model
{
    use HasFactory;
    protected $table = 'technical_squads';
    protected $fillable = [
        'lang',
        'team',
        'season_id',
        'image',
        'mission',
        'name',
        'nationality',
        'birthday',
        'biography',
        'is_active',
        'slug',
        'created_by',
        'updated_by',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
