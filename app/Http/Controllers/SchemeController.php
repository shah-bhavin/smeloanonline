<?php

namespace App\Http\Controllers;
use App\Models\Scheme;
use Illuminate\Http\Request;
use DataTables;

class SchemeController extends Controller
{
    public function index(){     
        return view('scheme');
    }


    public function listSchemes(Request $request){
     
        if ($request->ajax()) {  
            $data = Scheme::latest()->get();  
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){ 
                        if($row->status == 1){
                            $span = '<span class="badge bg-success">Active</span>';
                        }elseif($row->status == 2){
                            $span = '<span class="badge bg-danger">Inactive</span>';
                        }  
                        return $span;
                    })
                    ->addColumn('action', function($row){   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editScheme"><span class="fa fa-edit"></span></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteScheme"><span class="fa fa-trash"></span></a>';
                           return $btn;
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
        }
        //return response()->json($data);
    }

    public function saveScheme(Request $request){
        Scheme::updateOrCreate([
            'id' => $request->scheme_id],[
            'scheme_name' => $request->scheme_name,
            'status' => $request->status, 
        ]);        
     
        return response()->json(['success'=>'Record saved successfully.']);
    }

    public function editScheme($id){
        $scheme = Scheme::find($id);
        return response()->json($scheme);
    }

    public function deleteScheme($id){
        Scheme::find($id)->delete();      
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
