<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    /** @var string  */
    private static $locale = 'en';

    /**
     * @var string
     */
    private $tableTemplate = 'localizations_';

    /**
     * @return string
     */
//    public function getTable()
//    {
//        return $this->tableTemplate . self::$locale;
//    }

    /**
     * @param string $locale
     */
    public static function setLocale(string $locale)
    {
        self::$locale = $locale;
    }

    /**
     * @return string
     */
    public static function getLocale()
    {
        return self::$locale;
    }

    public function translate()
    {
        return $this->hasOne(LocalizationOthers::class, 'key_id', 'key');
    }


}
