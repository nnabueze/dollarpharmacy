<?php

namespace App\Http\Controllers\API;

use App\Product;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\Products as ProductsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Order;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Products
        $products = Product::paginate(15);

        // Return collection of products as a resource
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get product
        $product = Product::findOrFail($id);

        // Return single product as a resource
        return new ProductResource($product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allProduct($id)
    {
       $product = Product::where('category_id',$id)->get();

       return new ProductsResource($product);
    }

    public function order(Request $request)
    {
        //echo "string";die;
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' =>'required',
            'address' =>'required',
            'totalAmount' =>'required',
            'userId' =>'required',
            'userId' =>'required',
        ]);

        if ($validator->fails()) {
            return response([
                'error'=>$validator->messages(),
            ], 400)->header('Content-Type', 'application/json');
        }

        $user = User::find($request->userId);

        $order = new Order();

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->amount = $request->totalAmount;
        $order->payment_type = 'card';
        $order->reference = str_random(5).str_random(3).str_random(2).str_random(2);
        $order->cart = serialize($request->product);
         $order->status = 'Paid';
         $order->pickup_date = $request->pickUpDate;

        $user->orders()->save($order);

        return response([ 'order' => $order,
                        'message'=>"Sucessful"
                    ], 200)->header('Content-Type', 'application/json'); 
    }

    public function getOrder($id)
    {
        $order = Order::where('reference',$id)->first();


        if ($order == null) {
            return response([
                'error'=>"Invalid order ID",
            ], 400)->header('Content-Type', 'application/json');
        }else{
            
        $order->cart = unserialize($order->cart);
            return response([ 'order' => $order,
                        'message'=>"Sucessful"
                    ], 200)->header('Content-Type', 'application/json'); 
        }
    }
}
