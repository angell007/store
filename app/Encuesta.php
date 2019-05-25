<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $fillable =[
        
        'user_id',
        'post_id',
        'pregunta1',
        'pregunta2'
    ]; 
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opcions()
    {
        return $this->hasMany(Opcion::class);
    }
}
