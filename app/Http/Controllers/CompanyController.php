<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CompanyController extends Controller
{
	   public function __construct()
    {
        $this->middleware('auth');
    }
     public function create()
    {
    	
    	return view('company.create');
    }

     public function store(Request $request)
    {
    	
    	$validatedData = $request->validate([
        'name' => 'required|unique:companies|max:255',
        'email' => 'required',
          'website' =>'required|unique:companies|max:255',
          'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
    ]);
    	//dd($request->all());
    	$data=array();
    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['website']=$request->website;
    	$logo=$request->file('logo');
    	if ($logo) {
    		    $logo_name= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
                $logo_name= date('dmy_H_s_i');
//dd($image_one_name);
                $ext=strtolower($logo->getClientOriginalExtension());
                $logo_full_name=$logo_name.'.'.$ext;
                $upload_path='storage/app/public/';
                $logo_url=$upload_path.$logo_full_name;
                $success=$logo->move($upload_path,$logo_full_name);
           //   dd($success);
                $data['logo']=$logo_url;
                $brand=DB::table('companies')
                          ->insert($data);
                   
                return Redirect()->back();             

    	}
    }

     public function index()
    {
    	$post=DB::table('companies')->get();
    	return view('company.index',compact('post'));      
    }

     public function destroy($id)
    {
    	$post=DB::table('companies')->where('id',$id)->first();
    	$logo=$post->logo;
    	unlink($logo);
    	DB::table('companies')->where('id',$id)->delete();
                return Redirect()->back();
    }

     public function edit($id)
    {
    	$company=DB::table('companies')->where('id',$id)->first();
    	return view('company.edit',compact('company'));
    }

    public function update(Request $request,$id)
    {
    	//dd($request->all());
    	$oldlogo=$request->old_logo;
    	$data=array();
    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['website']=$request->website;
    	$logo=$request->file('logo');
    	if ($logo) {
    		 unlink($oldlogo);
    		    $logo_name= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
                $logo_name= date('dmy_H_s_i');
              //  dd($logo_name);
//dd($image_one_name);
                $ext=strtolower($logo->getClientOriginalExtension());
                $logo_full_name=$logo_name.'.'.$ext;
                $upload_path='storage/app/public/';
                $logo_url=$upload_path.$logo_full_name;
                //dd($logo_url);
                $success=$logo->move($upload_path,$logo_full_name);
           //   dd($success);
                $data['logo']=$logo_url;
                $brand=DB::table('companies')->where('id',$id)
                          ->update($data);
                   
                return Redirect()->back();             

    	}else{
    		   $data['logo']=$oldlogo;
               DB::table('companies')->where('id',$id)->update($data);
           
                return Redirect()->route('all.company');	
    	}
    }

}
