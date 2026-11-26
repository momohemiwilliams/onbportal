<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
  
class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
  
        return view('products.index',compact('products'));
    }
  
   
    public function createStepOne()
    {
      
        return view('products.create-step-one');
    }


    public function createStepOneedit($product_id)
    {
         $product = Product::find($product_id);
       
        return view('products.create-step-one-edit',compact('product'));
    }
  
   
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
        ]);
  

            $product = new Product();
            $product->fill($validatedData);
            $request->session()->put('product', $product);
    
   
            $product->save();
            $product_id = $product->id;

        return Redirect::to('/products/create-step-two/'. $product_id);
  
      
    }



    public function steponeupdate(Request $request, $product_id)
    { 

        
        $validatedData = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
        ]);
  

           
            $product = Product::where('id', $product_id)->first(); 
              $product->fill($validatedData);

            $product->update();
            $product_id = $product->id;

        return Redirect::to('/products/create-step-two/'. $product_id);
  
      
    }



    public function postCreateStepOneEdit($product_id)
    {

         $product_update = Product::find($product_id);
         $product_update->save();
        return Redirect::to('/products/create-step-two-edit/'. $product_id);
    }


  
 
    public function createStepTwo($product_id)
    {
        $product = Product::find($product_id);
       
  
        return view('products.create-step-two',compact('product'));
    }


    public function createStepTwoedit($product_id)
    {
         $product = Product::find($product_id);
       
        return view('products.create-step-two-edit',compact('product'));
    }
   


    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);
  
        $product = $request->session()->get('product');
        $product->fill($validatedData);
        $request->session()->put('product', $product);

         $id = $product->id;


        $product_update = Product::find($id);
        $product_update->stock = $request->input('stock');
        $product_update->status = $request->input('status');
        $product_update->save();

       
          $product_id = $product->id;

         return Redirect::to('products/stagethree/'. $product_id);
       
    }
  
   

    public function stagethree($product_id)
    {
         $product = Product::find($product_id);
         return view('products.create-step-three',compact('product'));
    }


    public function createStepThree($product_id)
    {
        return   $product = Product::find($product_id);
        return view('products.create-step-two',compact('product'));
    }
    
  
   
    public function postCreateStepThree(Request $request)
    {
        $product = $request->session()->get('product');
        $id = $product->id;
        $product_update = Product::find($id);

        $product_update->save();
        return redirect()->route('products.index');
    }
}
