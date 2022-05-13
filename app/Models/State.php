<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;
    protected $fillable=['country_id','name'];
    public function country()
    {
       return $this->belongsTo(country::class);
    }
    public function city()
    {
        return $this->hasMany(City::class);
    }

}
