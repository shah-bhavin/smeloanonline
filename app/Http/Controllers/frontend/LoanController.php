<?php

namespace App\Http\Controllers\frontend;
use App\Models\Product;
use App\Models\Machineloan;
use App\Models\Projectloan;
use App\Models\Subsidyloan as Subsidyloan;
use Illuminate\Http\Request;


class LoanController
{   
    public function index(Request $request){
        $data['subsidies'] = Product::where(['product_type' => '2', 'status'=>'1'])->get();
        $data['loans'] = Product::where(['product_type' => '1', 'status'=>'1'])->get();
        return view('default')->with($data);
    }

    public function loan(Request $request){
        $data['subsidies'] = Product::where(['product_type' => '2', 'status'=>'1'])->get();
        $data['loans'] = Product::where(['product_type' => '1', 'status'=>'1'])->get();
        return view('loan.'.$request->loan_type)->with($data);
    }

    public function listApplication(Request $request){
        $Machineloan = Machineloan::select('id', 'name', 'phone', 'status')->where(['status'=>'1'])->get();
        $Machineloan->map(function($data){
            $data['product_type'] = 'Loan';
            $data['product'] = 'Machine Loan';
        });
        $Projectloan = Projectloan::select('id', 'name', 'phone', 'status')->where(['status'=>'1'])->get();
        $Projectloan->map(function($data){
            $data['product_type'] = 'Loan';
            $data['product'] = 'Project Loan';
        });
        $Subsidyloan = Subsidyloan::select('id', 'name', 'phone', 'status')->where(['status'=>'1'])->get();
        $Subsidyloan->map(function($data){
            $data['product_type'] = 'Loan';
            $data['product'] = 'Subsidy Loan';
        });
        $data = $Machineloan->concat($Projectloan)->concat($Subsidyloan);
        return $data;
    }

    public function saveLoan(Request $request){
       
        if($request->table == 'Subsidy Loan'){
            $table = new Subsidyloan;
            $table::updateOrCreate([
                'id' => $request->id],[
                'name' => $request->name,
                'phone' => $request->phone,
                'cost_with_gst' => $request->cost_with_gst,
                'machine_used_before' => $request->machine_used_before,
                'machine_ready_time' => $request->machine_ready_time,
                'status' => 1,
            ]); 
        }elseif($request->table == 'Machine Loan'){
            $table = new Machineloan;
            $table::updateOrCreate([
                'id' => $request->id],[
                'name' => $request->name,
                'phone' => $request->phone,
                'cost_with_gst' => $request->cost_with_gst,
                'machine_used_before' => $request->machine_used_before,
                'machine_ready_time' => $request->machine_ready_time,
                'status' => 1,
            ]); 
        }elseif($request->table == 'Project Loan'){
            $table = new Projectloan;
            $table::updateOrCreate([
                'id' => $request->id],[
                'name' => $request->name,
                'phone' => $request->phone,
                'cost_of_land' => $request->cost_of_land,
                'cost_of_construction' => $request->cost_of_construction,
                'cost_with_gst' => $request->cost_with_gst,
                'project_line' => $request->project_line,
                'project_stage' => $request->project_stage,
                'production_start_time' => $request->production_start_time,
                'status' => 1,
            ]); 
        }
     
        return response()->json(['msg_type'=>'alert-success','msg_body'=>'Record saved / Updated successfully.']);
    }

    public function viewLoan(Request $request){

        if($request->type == 'Machine Loan'){
            $data = Machineloan::select('id', 'name', 'phone', 'status')->first()->where(['status'=>'1', 'id' => $request->id])->get();
            $data->map(function($data){
                $data['product_type'] = 'Loan';
                $data['product'] = 'Machine Loan';
            }); 
        }elseif($request->type == 'Project Loan'){
            $data = Projectloan::select('id', 'name', 'phone', 'status')->first()->where(['status'=>'1', 'id' => $request->id])->get();
            $data->map(function($data){
                $data['product_type'] = 'Loan';
                $data['product'] = 'Project Loan';
            });
        }elseif($request->type == 'Subsidy Loan'){
            $data = Subsidyloan::select('id', 'name', 'phone', 'status')->first()->where(['status'=>'1', 'id' => $request->id])->get();
            $data->map(function($data){
                $data['product_type'] = 'Loan';
                $data['product'] = 'Subsidy Loan';
            });
        }

        
        return $data[0];

    }
}
