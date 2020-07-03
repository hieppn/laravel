<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products(){
        //khoa ngoai va khoa chin cua 2 bang tuong ung
        return $this->hasMany("App\Product",'id_category',"id");
    }
}
