<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $dates = ['date'];
    protected $fillable = [
        'title',
        'discription',
        'city',
        'private',
        'image',
        'items',
        'date',
        'user_id'
    ];
    protected $casts = [
        'items' => 'array'
    ];
    protected $guarded = [];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
