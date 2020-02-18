<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalizationOthers extends Model
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
    public function getTable()
    {
        return $this->tableTemplate . Localization::getLocale();
    }



}
