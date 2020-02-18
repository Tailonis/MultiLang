<?php

namespace App\Observers;

use App\Models\Languages;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class LanguagesObserver
{
    /**
     * Handle the languages "created" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function create(Languages $languages)
    {
        dd($languages);
        $language = $languages->getAttribute('title');
        Schema::create('localizations_'.$language, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('key_id')->unique();
            $table->foreign('key_id')->references('id')->on('languages');
            $table->text('localization');
            $table->timestamps();
        });
    }

    /**
     * Handle the languages "updated" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function updated(Languages $languages)
    {
        dd($languages);
    }

    /**
     * Handle the languages "deleted" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function deleted(Languages $languages)
    {
        //
    }

    /**
     * Handle the languages "restored" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function restored(Languages $languages)
    {
        //
    }

    /**
     * Handle the languages "force deleted" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function forceDeleted(Languages $languages)
    {
        //
    }
}
