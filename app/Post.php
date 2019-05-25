<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if(is_null($post->user_id)) {
                $post->user_id = auth()->user()->id;
            }
        });

        static::deleting(function ($post) {
            $post->comments()->delete();
        });
    }

  
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class)->withTimestamps();
    // }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    // public function scopePublished($query)
    // {
    //     return $query->where('is_published', true);
    // }

    // public function scopeDrafted($query)
    // {
    //     return $query->where('is_published', false);
    // }

    // public function getPublishedAttribute()
    // {
    //     return ($this->is_published) ? 'Yes' : 'No';
    // }

    // public function category()
    // {
    //     return $this->belongsTo('App\Category');
    // }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
