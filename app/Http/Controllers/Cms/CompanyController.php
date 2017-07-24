<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public $module = 'company';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        
         
    }

    public function _edit(Request $request){
        $company = Company::find((int) $request->user()['id']);
        if(!$company){
            $company = new Company();
            $company->uid = (int) $request->user()['id'];
            $company->name = '';
            $company->save();
        }

        return View('cms.company.edit', [
                'company' => Company::findOrFail((int) $request->user()['id'])
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->name = $request->has('name') ? $request->input('name') : '';
        $company->addr = $request->has('addr') ? $request->input('addr') : '';
        $company->qq = $request->has('qq') ? $request->input('qq') : '';
        $company->tel = $request->has('tel') ? $request->input('tel') : '';
      
        $company->save();
        return  redirect()->route('articles._edit');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
