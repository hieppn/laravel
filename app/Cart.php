<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product(){
        return $this->hasMany("App\Product","id","id_product");
      }
      public function user(){
        return $this->hasOne("App\User","id","id_user");
      }
}
