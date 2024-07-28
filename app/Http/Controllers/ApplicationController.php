<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApplicationController extends Controller
{
    public function listApplications(Request $request){
        $applications = Application::orderBy('created_at', 'DESC');
        if(!empty($request->keyword)){
            $applications->where('enterprise_name', 'like', '%'.$request->keyword.'%');
        }
        $applications = $applications->paginate(10);
        return view('applications.list', [
            'applications' => $applications
        ]);
    }

    public function addApplication(){
        return view('applications.add');
    }

    public function saveApplication(Request $request){

        $rules = [
            'enterprise_name' => 'required|min:3',
            'enterprise_office_address' => 'required',
            'enterprise_factory_address' => 'required',
            'udaym_reg_no' => 'required',
            'udyam_reg_date' => 'required',
            'enterprise_pan' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'enterprise_constitution' => 'required',
            'premises_type' => 'required',
            'located_in_municipal_area' => 'required',
            'enterprise_category' => 'required',
            'enterprise_type' => 'required',
            'enterprise_activity' => 'required',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if(!empty($request->id) && $validator->fails()){
            return redirect()->route('edit.application')->withInput()->withErrors($validator);
        }
        elseif($validator->fails()){
            return redirect()->route('add.application')->withInput()->withErrors($validator);
        }

        if(!empty($request->id)){
            $application = Application::find($request->id);
        }else{
            $application = new Application();
        }

        $application->enterprise_name = $request->enterprise_name;
        $application->enterprise_office_address = $request->enterprise_office_address;
        $application->enterprise_factory_address = $request->enterprise_factory_address;
        $application->udaym_reg_no = $request->udaym_reg_no;
        $application->udyam_reg_date = $request->udyam_reg_date;
        $application->enterprise_pan = $request->enterprise_pan;
        $application->telephone = $request->telephone;
        $application->email = $request->email;
        $application->website = $request->website;
        $application->enterprise_constitution = $request->enterprise_constitution;
        $application->premises_type = $request->premises_type;
        $application->located_in_municipal_area = $request->located_in_municipal_area;
        $application->enterprise_category = $request->enterprise_category;
        $application->enterprise_type = $request->enterprise_type;
        $application->enterprise_activity = $request->enterprise_activity;
        $application->status = $request->status;
        $application->save();

        return redirect()->route('list.application')->with('success', 'Application Added Succesfully.');

    }
    
    public function editApplication($id){
        $application = Application::findOrFail($id);
        return view('applications.edit', [
            'application' => $application
        ]);
    }

    public function deleteApplication(Request $request){
        $application = Application::find($request->id);
        if($application == null){
            session()->flash('error', 'Application Not found');
            return response()->json([
                'status'=>false,
                'message'=>'Application Not found'
            ]);
        }else{  
            $application->delete();
            session()->flash('success', 'Application deleted Successfully');
            return response()->json([
                'status'=>true,
                'message'=>'Application deleted Successfully.'
            ]);
        }
        
    }
}
