<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    public function localizations()
    {
        return $this->hasOne('App\Models\Localization_others');
    }

    public static function setLocale($locale)
    {
        return $locale;
    }
}
