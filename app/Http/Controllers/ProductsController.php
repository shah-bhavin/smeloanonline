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

    public function showProductsHome(Request $request){
     
        $data['subsidies'] = Product::where(['product_type' => '2', 'status'=>'1'])->get();  
        $data['loans'] = Product::where(['product_type' => '1', 'status'=>'1'])->get();  

        return view('default')->with($data);
    }

    public function listProducts(Request $request){
     
        if ($request->ajax()) {  
            $data = Product::latest()->select('id', 'product_name', 'product_shortname', 'product_type', 'status', 'created_at', 'updated_at')->get();  
        }
        
        return response()->json($data->toArray());
    }

    public function saveProduct(Request $request){
        Product::updateOrCreate([
            'id' => $request->product_id],[
            'product_name' => $request->product_name,
            'product_shortname' => $request->product_shortname,
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
