<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Orders;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class TransactionController extends Controller
{
    public function index(){
        $title = "Order List";
        $orders = Orders::orderBy('id', 'desc')->get();
        return view('pos.index', compact('title', 'orders'));
    }

    public function create()
    {
        $title = "Add New Order";
        $categories = Categories::orderBy('id', 'desc')->get();
        $products = Products::orderBy('id', 'desc')->get();
        return view('pos.create', compact('title', 'categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query_order_code = Orders::max('id');
        $query_order_code++;
        $order_code = "ORD" . date("dmY") . sprintf("%03d", $query_order_code);
        $data = [
            'order_status' => 1,
            'order_change' => 1,
            'order_code' => $order_code,
            'order_date' => date("Y-m-d"),
            'order_amount' => $request->grandtotal,
        ];

        $order = Orders::create($data);
        $qty = $request->qty;
        foreach ($qty as $key => $jumlah) {
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id[$key],
                'qty'=> $request->qty[$key],
                'order_price'=> $request->order_price[$key],
                'order_subtotal'=> $request->order_subtotal[$key]
            ]);
        }
        toast('Order Data Successfully Added!', 'success');


        return redirect()->to('pos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Orders::findOrFail($id);
        $orderDetails = OrderDetails::with('kepemilikan_produk', 'kepemilikan_pesanan')->where('order_id', $id)->get();
        // return $orderDetails;
        $title = "Order Details of " . $order->order_code;
        return view('pos.show', compact('order', 'orderDetails', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Products::findOrFail($id);
        $title = "Edit Product";
        $categories = Categories::orderBy('id', 'desc')->get();
        return view('products.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'is_active' => $request->is_active
        ];

        $product = Products::findOrFail($id);
        if ($request->hasFile('product_photo')) {
            File::delete(public_path('storage/'.$product->photo));
        }

        $photo = $request->file('product_photo')->store('products', 'public');
        $data['product_photo'] = $photo;

        $product->update($data);

        toast('Product Data Successfully Updated!', 'success');

        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        File::delete(public_path('storage/'.$product->product_photo));
        $product->delete();
        toast('Product Data Successfully Deleted!', 'success');
        return redirect()->to('products')->with('success', 'Product Data Successfully Deleted!');
    }

    public function getProduct($category_id){
        $products = Products::where('category_id', $category_id)->get();
        $response = ['status' => 'success', 'message' => 'Product Successfully Fetched!', 'data' => $products];
        return response()->json($response, 200);
    }

    public function print(string $id)
    {
        $order = Orders::with('orderDetails')->findOrFail($id);
        $orderDetails = OrderDetails::with('kepemilikan_produk', 'kepemilikan_pesanan')->where('order_id', $id)->get();
        return view('pos.print-bill', compact('order', 'orderDetails'));
    }
}
