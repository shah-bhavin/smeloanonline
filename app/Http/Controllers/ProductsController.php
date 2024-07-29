<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;

class ProductsController extends Controller
{
    public function index(){     
        return view('product');
    }

    public function listProducts(Request $request){
     
        if ($request->ajax()) {  
            $data = Product::latest()->select('id', 'product_name', 'product_type', 'status', 'created_at', 'updated_at')->get();  
            
            // return Datatables::of($data)
            //     ->addIndexColumn()
            //     ->addColumn('status', function($row){ 
            //         if($row->status == 1){
            //             $span = '<span class="badge bg-success">Active</span>';
            //         }elseif($row->status == 2){
            //             $span = '<span class="badge bg-danger">Inactive</span>';
            //         }  
            //         return $span;
            //     })
            //     ->addColumn('product_type', function($row){ 
            //         if($row->product_type == 1){
            //             $product_type = 'Loan';
            //         }elseif($row->product_type == 2){
            //             $product_type = 'Subsidy';
            //         }  
            //         return $product_type;
            //     })
            //     ->addColumn('action', function($row){   
            //             $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><span class="fa fa-edit"></span></a>';
            //             $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><span class="fa fa-trash"></span></a>';
            //             return $btn;
            //     })
            //     ->rawColumns(['status','product_type','action'])
            //     ->make(true);
        }
        
        return response()->json($data->toArray());
    }

    public function saveProduct(Request $request){
        Product::updateOrCreate([
            'id' => $request->product_id],[
            'product_name' => $request->product_name,
            'product_desc' => $request->product_desc,
            'product_type' => $request->product_type,
            'status' => $request->status, 
        ]);        
     
        return response()->json(['success'=>'Record saved successfully.']);
    }

    public function editProduct($id){
        $product = Product::find($id);
        return response()->json($product);
    }

    public function deleteProduct($id){
        Product::find($id)->delete();      
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
