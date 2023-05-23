<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == 1) {
            $total_products = Product::all()->count();
            $total_customers = User::all()->count();
            $total_orders = Order::all()->count();
            $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
            $delivery_processing = Order::where('delivery_status', '=', 'processing')->get()->count();


            $orders = Order::all();
            $total_revenue = 0;
            foreach ($orders as $order) {
                $total_revenue = $total_revenue + $order->price;
            }
            return view('admin.home', compact('total_products', 'total_customers', 'total_orders', 'total_revenue', 'total_delivered', 'delivery_processing'));
        } else {
            $products = Product::paginate(3);
            return view('home.userpage', compact('products'));
        }
    }

    public function pro()
    {
        $products = Product::paginate();
        return view('home.products', compact('products'));
    }

    public function index()
    {
        $products = Product::paginate(3);
        return view('home.userpage', compact('products'));
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user(); // get user data
            $product = Product::find($id);
            $quantity = $request->quantity;
            $cart = new Cart;
            // dd($user);
            // dd($product);

            $user_id = $user->id;
            $product_exist_id = cart::where('product_id', '=', $id)->where('user_id', '=', $user_id)->get('id')->first();

            if ($product_exist_id) {
                $cart = cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
                Alert::success('Product added successfully','We have added product to the cart');
                $cart->save();
                return redirect()->back()->with('message','product added successfullly');

             
            } else {
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->product_title = $product->title;
                $cart->quantity = $request->quantity;

                if ($product->discount_price != null) {

                    $cart->price = $product->discount_price * $request->quantity;
                } else {
                    $cart->price = $product->price * $request->quantity;
                }

                $cart->image = $product->image;
                $cart->product_id = $product->product_id;
                $cart->user_id = $user->id;

                $cart->save();
                return redirect()->back()->with('message','product added successfullly');
            }
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {

        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.show_cart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        Alert::success('Product Deleted successfully from cart');

        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user(); //login user
        $id = $user->id; //login user id
        $cart = cart::where('user_id', '=', $id)->get(); //get all data from cart of selected/login user
        // dd($cart);


        foreach ($cart as $cart) {
            $order = new Order;
            $order->name = $cart->name;
            $order->email = $cart->email;
            $order->phone = $cart->phone;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;
            $order->product_title = $cart->product_title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;
            $order->payment_status = "cash on delivery";
            $order->delivery_status = "processing";
            $order->save();

            $cart_id = $cart->id;
            $data = Cart::find($cart_id);
            $data->delete();
        }

        return redirect()->back()->with('message', 'We have recieved your order we will contact you soon');
    }


    public function contact()
    {
        return view('home.contact');
    }
    public function blog()
    {
        return view('home.blog');
    }

    public function stripe($total_price)
    {
        return view('home.stripe', compact('total_price'));
    }

    public function stripepost(Request $request, $total_price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // dd($total_price);
        Stripe\Charge::create([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment"
        ]);

        $user = Auth::user(); //login user
        $id = $user->id; //login user id
        $cart = cart::where('user_id', '=', $id)->get(); //get all data from cart of selected/login user
        // dd($cart);


        foreach ($cart as $cart) {
            $order = new Order;
            $order->name = $cart->name;
            $order->email = $cart->email;
            $order->phone = $cart->phone;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;
            $order->product_title = $cart->product_title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;
            $order->payment_status = "Online payment";
            $order->delivery_status = "Processing";
            $order->save();

            $cart_id = $cart->id;
            $data = Cart::find($cart_id);
            $data->delete();
        }




        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function order_details()
    {
        if(Auth::id()){

        
        $user = Auth::user(); //loged in user info
        $user_id = $user->id;
        $order = Order::where('user_id', '=', $user_id)->get();
        return view('home.order_details', compact('order'));
        }
        else{
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "Cancelled";
        $order->save();
        return redirect()->back();
    }

    public function delete_order($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $data = $request->textsearch;
        $products = Product::where('title', 'LIKE', "%$data%")->paginate();
        return view('home.products', compact('products'));
    }

    public function product_searchh(Request $request)
    {
        $data = $request->textsearch;
        $products = Product::where('title', 'LIKE', "%$data%")->paginate();
        return view('home.userpage', compact('products'));
    }

   
}
