<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Company;
use App\Http\Requests\Cms\StoreCompany;
use Illuminate\Support\Facades\DB;
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
        return redirect('/home/companies/config');
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
    public function store(StoreCompany $request, Company $company)
    {
        
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
    public function edit(Request $request, Company $company, $name)
    {

        $company = null;
        try{
            DB::beginTransaction();
            $company = Company::firstOrNew([
                'site_id' => $request->user()->getSite()->id,
                'u_id' => $request->user()->id
            ]); 
            // 设置默认值
            if(!$company->id){
                $company->desc = '';
                $company->save();
            }
            DB::commit();
        }catch(\Exception $e){
            print_r($e);
            DB::rollBack();
        }
        return View('cms.company.edit', [
                'form' => $name,
                'company' => $company
            ]);
         
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request, Company $company)
    {
        $form = $request->input('form');
        /**
        $company->name = $request->has('name') ? $request->input('name') : '';
        $company->addr = $request->has('addr') ? $request->input('addr') : '';
        $company->qq = $request->has('qq') ? $request->input('qq') : '';
        $company->tel = $request->has('tel') ? $request->input('tel') : '';
        
        $company->save();
        **/

        try{
            switch ($form) {
                case 'password':
                    if($company->password != $request->input('password_old'))
                        throw new \Exception("原始密码输入错误", 1);
                    $company->password = $request->input('password');
                    $company->save();
                    break;
                case 'config':
                    $company->role = $request->input('role');
                    $company->status = $request->input('status');
                    $company->save();
                    break;
                case 'desc':
                    $company->short_desc = $request->input('short_desc');
                    $company->desc = $request->input('desc');
                    $company->save();
                    break;
                case 'qualification':
                    $company->qualification = $request->input('qualification');
                    $company->save();
                    break;
                case 'contact':
                    $company->name = $request->input('name');
                    $company->qq = $request->input('qq');
                    $company->telephone = $request->input('telephone');
                    $company->fax = $request->input('fax');
                    $company->wechat = $request->input('wechat');
                    $company->addr = $request->input('addr');
                    $company->email = $request->input('email');
                    $company->save();
                    break;
                default:
                    throw new \Exception("错误表单:" . $form, 1);
                    break;
            }
        }catch(\Exception $e){
            return back()
                ->withErrors(['err' => $e->getMessage()])->withInput();
        }
        
        return redirect('/home/companies/' . $form);
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
