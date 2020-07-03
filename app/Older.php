<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Older extends Model
{
    public function categoryo(){
        return $this->belongsTo("App\Category","id_category","id_category");
      }
      public function carto(){
        return $this->belongsTo("App\Cart","id_cart","id_cart");
      }
      public function producto(){
        return $this->belongsTo("App\Product","id_product","id_products");
      }
      public function useo(){
        return $this->hasOne("App\User","id_user","id_user");
      }
}
