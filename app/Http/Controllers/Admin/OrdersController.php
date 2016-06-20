<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductImage;
use App\Models\ProductAttribute;
use App\Models\Category;
use App\User;
use Illuminate\Support\Facades\Input;
use Session;

class OrdersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        $orders = Order::all();
        return view('Admin.order.list')->withOrders($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['products'] = Product::select('ID', 'name')->get();
        $data['users'] = User::select('ID', 'name')->get();
        return view('Admin.order.new')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $order = new Order;

        $order->product_id = $request->product_id;
        $order->user_id = $request->user_id;
        $order->status = 'Pending';
        $order->save();
        //Session::flash('success','The produuct was saved successfully');
        return redirect('admin/order/' . $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $order = Order::find($id);
        return view('Admin.order.detail')->withOrder($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['order'] = Order::find($id);
        $data['product'] = Product::select('ID', 'name')->get();
        $data['users'] = User::select('ID', 'name')->get();
        return view('Admin.order.edit')->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $order = Order::find($id);
        $order->product_id = $request->product_id;
        $order->user_id = $request->user_id;
        $order->status = $request->status;
        $order->save();
        Session::flash('info', 'The order was Updated successfully');
        return redirect('admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $order = Order::find($id);
        return view('Admin.order.delete')->withOrder($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $order = Order::find($id)->delete();
        Session::flash('danger', 'The order was deleted successfully');
        return redirect('admin/orders');
    }

    

}
