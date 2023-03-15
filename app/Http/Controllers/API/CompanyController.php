<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use Exception;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\InvalidData;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {

        try{
            $company=Company::query();
            if($req->has('search')){
                $company=$company->where('name','Like','%'.$req->search.'%')->orWhere('description','like','%'.$req->search.'%');
            }
            if($req->has('status')){
                $company=$company->where('status',$req->status);
            }
            if($req->has('with')){
                $with=explode(',',$req->with);
                $company=$company->with($with);
            }
            if($req->has('page') && $req->has('page_size')){
                return $this->success_json(data:$company->paginate($req->page_size),message:"Success get page data",paginate:true);
            }
            return $this->success_json(data:$company->get(),message:"Success get a data for company",code:200);
        }
        catch(\Exception $e){
            return $this->error_json(data:$e->getMessage(),message:"Failed to get api company");
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'name'=>'required'
        ]);
        try {
            $data=$req->all();

            $company=Company::create([$data]);
            if($data['job']){
                $company->job()->push($data['job']);
            }
            return $this->success_json(code:200,data:$company->load('job'),message:"Success to save in db");

           }
        catch(Exception $e){
            return $this->error_json(data:$e->getMessage(),message:"Failed to save api company");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company,Request $req)
    {
        try{
            if($req->has('load')){
                $load=explode(',',$req->load);
                $company->load($load);
             }
            return $this->success_json(code:200,data:$company,message:"get detail company");
      } catch(Exception $e){
        return $this->error_json(data:$e->getMessage(),message:"FAILED TO GET DETAIL");
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Company $company)
    {
        $req->validate([
            'name'=>'required'
        ]);
        try{
            $data=$req->all();
            $company->update($data);
            return $this->success_json(code:200,data:$company,message:"get detail company");
        } catch(Exception $e){
            return $this->error_json(data:$e->getMessage(),message:"FAILED TO GET DETAIL");
          }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        
        return $this->success_json(code:200,data:null,message:"Successful deleted");
    }
}
