<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ApplicationController extends Controller
{
    public function index(){     
        return view('application');
    }

    public function saveApplication(Request $request){

        $rules = [
            'name' => 'required|min:3',
            'mobile' => 'required',
            'city' => 'required',
            'loan_time' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
        
        Application::updateOrCreate([
            'id' => $request->application_id],[
            'applicants_name' => $request->name,
            'applicants_mobile' => $request->mobile,
            'applicants_city' => $request->city,
            'loan_time' => $request->loan_time,
            'product_type' => $request->product_type,
            'status' => 1,
        ]);        
     
        return response()->json(['msg_type'=>'alert-success','msg_body'=>'Record saved / Updated successfully.']);

    }


    public function listApplication(Request $request){
     
        if ($request->ajax()) {  
            $data = Application::latest()
            ->join('products', 'applications.product_type', '=', 'products.id')            
            ->select('applications.*', 'products.product_name')
            ->get();

            //->select('applications.*', DB::raw("CONCAT(products.product_name,' (', products.product_shortname,')') AS product_fullname"))

            
        }        
        return response()->json($data->toArray());
    }

    public function editApplication($id){
        $application = Application::find($id);
        return response()->json($application);
    }

    public function deleteApplication($id){
        Application::find($id)->delete();      
        return response()->json(['msg_type'=>'alert-success','msg_body'=>'Record deleted successfully.']);
    }
}
