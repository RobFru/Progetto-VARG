<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        // aggiungere tag per determinare se l'oggetto è nuovo/usato
        // aggiungere 
        'title','description', 'price', 'category_id', 'user_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category():BelongsTo
    { 
        return $this->belongsTo(Category::class);
    }
    
}
