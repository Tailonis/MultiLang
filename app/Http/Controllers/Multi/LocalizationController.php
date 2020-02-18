<?php

namespace App\Http\Controllers\multi;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class LocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
        Localization::setLocale($locale);
        $translates = Localization::query()->with('translate')->get();

//        $translates = DB::select( 'Select s.key, u.localization from localizations as s
//        left join localizations_' . $locale . ' as u on u.key_id = s.key');
//        dd($translates);
        return view('multi\localization', compact('translates', 'locale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locale = $request->input('title');
        return $this->index($locale);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveTranslate(Request $request)
    {
        $lang = $request->input('lang');
        $key = $request->input('key');
        $translateText = $request->input('localization');
        DB::table('localizations_' . $lang . '')->updateOrInsert(
            ['key_id' => $key],
            ['localization' => $translateText]
        );
        return $this->index($lang);

    }
}
