<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipaQuery extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message', 'address'];
    protected $table = 'shipa_query';


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')
            ->select('id','name','slug','last_name');
    }

    public function callCount()
    {
        return $this->hasMany(ShipaQueryPhone::class, 'query_id')->where('type',1)->orderby('id','desc');
    }

    public function callCountUser()
    {
        return $this->hasMany(ShipaQueryPhone::class, 'userId');
    }

    public function history()
    {
        return $this->hasMany(ShipaQueryHistories::class, 'company_id');
    }

    public function whatsappCallCount()
    {
        return $this->hasMany(ShipaQueryPhone::class, 'query_id')->where('type',2);
    }

    public function whatsappHistory()
    {
        return $this->hasMany(ShipaQueryHistories::class, 'company_id');
    }
}
