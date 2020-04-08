<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    public static function getSetting($key = null) {

      $setting = $key ? self::where('key', $key)->first() : self::get() ;

      $collect = collect();
      foreach ($setting as $setting) {
        $collect->put($setting->key, $setting->value);
      }

      return $collect;
    }
}
