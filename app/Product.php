<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Attribute;

class Product extends Model
{
   protected $fillable=['name','code','description','price'];

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function getUrlAttribute()
    {
        return route('admin.product.show',[$this->id,$this->slug]);
    }

    public function user()
    {
        return $this->belongsTo('user');
    }
    
}
