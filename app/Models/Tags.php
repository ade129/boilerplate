<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Tags extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'tags';
    protected $primaryKey = 'idtags';
    protected $fillable = [
        'tag_name','slug',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function quotes()
    {
       return $this->belongsToMany('App\Models\Quotes','quote_tag','idtags','idquotes');
    }
}
