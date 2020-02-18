<?php

namespace App\Http\Controllers\Multi;

use App\Http\Controllers\Controller;
use App\Models\Languages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $langs = Languages::select('id', 'title', 'name', 'active')->get();

        return view('multi\languages', compact('langs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('multi\languagesAdd');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->input());
        if(count($request->input()) == 4)
        {
            Languages::insert([
                'title' => $request->input('title'),
                'name' => $request->input('name'),
            ]);
            $this->createTable($request->input('title'));
            return $this->index();
        }elseif (count($request->input()) == 3) {
            $title = $request->input('title');
            $activate = $request->input('activate');
            Languages::where(['title' => $title])->update(['active' => $activate]);
            return $this->index();
        }else {
            $title = $request->input('title');
            Languages::where(['title' => $title])->delete();
            Schema::dropIfExists('localizations_'.$title);
            return $this->index();
        }

    }

    public function createTable($language)
    {
        Schema::create('localizations_' . $language, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key_id')->unique();
            $table->foreign('key_id')->references('key')->on('localizations');
            $table->text('localization');
            $table->timestamps();
        });
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
}
