<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EmployeeController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

       public function create()
    {
    	
    	$company=DB::table('companies')->get();
    	//return response()->json($category);
    	return view('employee.create',compact('company'));
    }

      public function Store(Request $request)
    {

    	$validatedData = $request->validate([
        'firstname' => 'required|unique:employees|max:255',
         'lastname' => 'required|unique:employees|max:255',
        'email' => 'required',
           'company_id' => 'required',
         'phone' => 'required',
           'salary' => 'required',
    ]);
    	//dd($request->all());
    	$data=array();
    	$data['firstname']=$request->firstname;
    	$data['lastname']=$request->lastname;
    	$data['company_id']=$request->company_id;
    	$data['email']=$request->email;
    	$data['phone']=$request->phone;
    	$data['salary']=$request->salary;
    		$data['department']=$request->department;
    	DB::table('employees')->insert($data);
  
        return Redirect()->back();
    }

      public function index(Request $request)
    {
    	//dd($request->all());
    		$company=DB::table('companies')->get();

    			$employee=DB::table('employees')->distinct()->get(['salary']);
    			$employee1=DB::table('employees')->distinct()->get(['department']);
    			//dd($employee);
    	$post1=DB::table('employees')
    	 ->join('companies','employees.company_id','companies.id')
    	       ->select('employees.*','companies.name');

    	        if(isset($request->company_id) && $request->company_id != 'null')
          $post1->where('employees.company_id',$request->company_id);

       if(isset($request->salary) && $request->salary != 'null')
          $post1->where('employees.salary',$request->salary);

       if(isset($request->department) && $request->department != 'null')
          $post1->where('employees.department',$request->department);

        $post=$post1->get();
    	return view('employee.index',compact('post','company','employee','request','employee1'));      
    }

     public function destroy($id)
    {
    	DB::table('employees')->where('id',$id)->delete();
                return Redirect()->back();
    }

     public function edit($id)
    {
    		$company=DB::table('companies')->get();
    	$employee=DB::table('employees')->where('id',$id)->first();
    	return view('employee.edit',compact('employee','company'));
    }
    public function update(Request $request,$id)
    {
    	//dd($request->all());
    
    	$data=array();
        $data['firstname']=$request->firstname;
    	$data['lastname']=$request->lastname;
    	$data['company_id']=$request->company_id;
    	$data['email']=$request->email;
    	$data['phone']=$request->phone;
    	$data['salary']=$request->salary;
    		$data['department']=$request->department;
    	DB::table('employees')->update($data);
  
        return Redirect()->back();
    }
}
