<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Quotes extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'quotes';
    protected $primaryKey = 'idquotes';
    protected $fillable = [
        'tittle','slug','subject'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags','quote_tag','idquotes','idtags');
    }

    public function images()
    {
        return $this->hasOne('App\Models\Images','idquotes');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comments','idquotes');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','idusers');
    }
}
