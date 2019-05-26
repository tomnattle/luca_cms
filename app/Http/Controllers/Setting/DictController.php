<?php

namespace App\Http\Controllers\Setting;

use App\Setting\Dict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DictController extends Controller
{

    public $module = 'dict';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dicts = Dict::all();
        return View('setting.dict.index', [
            'dicts' => $dicts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 123;
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'content' => 'required|max:65535|min:2',
            'name' => 'required|max:45|min:2|unique:dicts',
            'key' => 'required|max:45|min:2|unique:dicts',
        ]);

        $dict = new Dict();
        $dict->content = $request->input('content');
        $dict->name = $request->input('name');
        $dict->key = $request->input('key');
        $dict->save();
        if($request->ajax()){
            return $dict;
        }else{
            return 1;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Dict $dict)
    {
        if ($request->ajax()){
            return $dict;
        }
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
    public function update(Request $request, Dict $dict)
    {
        $this->validate($request, [
            'content' => 'required|max:65535|min:2',
        ]);
        
        $dict->content = $request->input('content');
        $dict->save();
        if($request->ajax()){
            return $dict;
        }else{
            return 1;
        }
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
