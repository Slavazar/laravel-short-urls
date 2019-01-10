<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'urls';
    
    protected $fillable = [
        'title',
        'url',
        'url_token',
        'created_at',
        'updated_at'
    ];
    
    public function getShortUrl()
    {
        return url('go') . '/' . $this->url_token;
    }
}
