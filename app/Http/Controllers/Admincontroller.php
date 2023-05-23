<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use \PDF;

class Admincontroller extends Controller
{
    //



    public function view_category()
    {

        if(Auth::id()){
            $data = Category::all();
        return view('admin.category', compact('data'));
        }
        else{
            return redirect('login');
        }
    }


    public function add_category(Request $request)
    {

        $data = new Category;
        $category_name = $request->category_name;
        $data->category_name = $category_name;
        $data->save();
        return redirect()->back()->with('message', 'Category added successfully');
    }


    public function delete_category($id)
    {

        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }


    public function update_category($id)
    {
    }

    public function add_product(Request $request)
    {
        // $data = $request->all();
        // echo "<pre>";
        // print_r($data);


        $product = new Product;
        $p_name = $request->product_name;
        $p_desc = $request->product_description;
        $p_price = $request->product_price;
        $p_discount = $request->product_discount;
        $p_quantity = $request->product_quantity;
        $p_category = $request->product_category;

        $p_image = $request->product_image; // product temprory name
        $p_original_name = $p_image->getClientOriginalName(); // product original name with extension
        $p_image_name = time() . '_' . $p_original_name; // time + product original name so names can't be same 
        $request->product_image->move('products', $p_image_name);

        // echo $p_name . '<br>';
        // echo $p_desc . '<br>';
        // echo $p_price . '<br>';
        // echo $p_discount . '<br>';
        // echo $p_quantity . '<br>';
        // echo $p_category . '<br>';
        // echo $p_image . '<br>';
        // echo $p_image_name . '<br>';
        // echo $p_original_name . '<br>';



        $product->title = $p_name;
        $product->description = $p_desc;
        $product->image = $p_image_name;
        $product->category = $p_category;
        $product->quantity = $p_quantity;
        $product->price = $p_price;
        $product->discount_price = $p_discount;

        $product->save();
        return redirect()->back()->with('message', 'Product is added successfully');
    }

    public function view_product()
    {

        if(Auth::id()){
            
            $categories = Category::all();
            return view('admin.product', compact('categories'));
        }
        else{
            return redirect('login');
        }
    }

    public function show_product()
    {

        if(Auth::id()){
        $products = Product::all();
        return view('admin.show_product', compact('products'));
        }
        else{
            return redirect('login');
        }

        // $products = Product::all()->toArray();
        // echo "<pre>";
        // print_r($products);

        // return view('admin.show_product');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.update_product', compact('product', 'categories'));

        // return redirect()->back()->with('message','Product updated successfully');
    }

    public function update_product(Request $request,$id)
    {
        $product = Product::find($id);

        $product->title = $request->product_name;
        $product->description = $request->product_description;
        $product->category = $request->product_category;
        $product->quantity = $request->product_quantity;
        $product->price = $request->product_price;
        $product->discount_price = $request->product_discount;
        
        
        $p_image = $request->product_image; // product temprory name
       if($p_image){
        $p_original_name = $p_image->getClientOriginalName(); // product original name with extension
        $p_image_name = time() . '_' . $p_original_name; // time + product original name so names can't be same 
        $request->product_image->move('products', $p_image_name);
        $product->image = $p_image_name;
       }

        $product->save();
        return redirect('show_product')->with('message','Product update successfully');



        // echo "<pre>";
        // print_r($product->toArray());
    }


    public function order(){
        if(Auth::id()){

            $orders = Order::get();
            // $orders = Order::get()->where('id',23);//where query
            return view('admin.orders',compact('orders'));
        }
        else{
            return redirect('login');
        }
    }

    public function delivered($id){
        $order = Order::find($id);
        $order->delivery_status = 'Delivered';
        $order->payment_status = 'Paid';
        $order->save();
        return redirect()->back()->with('message','product delivered successfully');
        
    }

    public function print_pdf($id){
        $pdf = PDF::loadView('admin.admin');
    return $pdf->download('order_details.pdf');
    }


    public function search(Request $request){
        $searchtext = $request->search;
        $orders = Order::where('product_title','LIKE',"%$searchtext%")->orWhere('name','LIKE',"%$searchtext%")->orWhere('phone','LIKE',"%$searchtext%")->get();
        return view('admin.orders',compact('orders'));
    }


    public function order_pdf(){
        return view('admin.orders');
    }

    public function practice(){
        // $data = Auth::id();  // Give loged in user id
        // $data = Auth::user();  // Give loged in user all information
        // $data = Auth::check();  // Give loged in user state 1 or 0
        // $data = Auth::user()->name;  // Give loged in user Name
        $data = Auth::user()->email;  // Give loged in user email


        
        return view('home.practice',compact('data'));
    }

    public function test(){
        return view('admin.test');
    }
}
