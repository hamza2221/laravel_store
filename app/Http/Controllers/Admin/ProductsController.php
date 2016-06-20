<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\product_Tag;
use App\Models\ProductAttribute;
use App\Models\Category;
use App\User;
use Illuminate\Support\Facades\Input;
use Session;
use Image;
use File;
use Validator;

class ProductsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        $product = Product::all();
        return view('Admin.product.list')->withProducts($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['categories'] = Category::select('ID', 'name')->get();
        $data['users'] = User::select('ID', 'name')->get();
        return view('Admin.product.new')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validation=Validator::make($request->input(),array(
                'name'=>'required|max:250',
                
            ));
        if($validation->fails()){
            return redirect('admin/products/create')->withErrors($validation)->withInput();
        }
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->status = $request->status;
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->sort_order = $request->sort_order;
        $product->quantity_available = $request->quantity_available;
        $product->save();
        //Session::flash('success','The produuct was saved successfully');
        return redirect('admin/products/uploadImages/' . $product->id);
    }

    function uploadImagesGet($productId) {
        return view('Admin.product.img_form')->withId($productId);
    }

    function uploadImagesPost() {
        //return view('admin.product.img_form')->withId($productId);
        $file = input::file('file');
        $productId = input::get('productId');
        //$file_name=time().'.'.$file->getClientOriginalExtension();
        //$file->move('public/',$file_name);
        //return "name is".$file_name;
        $count = 0;
        $unique_time = time();
        foreach ($file as $i) {
            $count++;
            if ($i->move('public/products/', $count . $unique_time . '.' . $i->getClientOriginalExtension())) {
                /**
                 * making thumbnail of 80x80
                 */
                $img = Image::make('public/products/' . $count . $unique_time . '.' . $i->getClientOriginalExtension());
                $img->resize(80, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('public/products/' . $count . $unique_time . '_thumb.' . $i->getClientOriginalExtension(), 60);
                /**
                 * making medium size image
                 */
                $img->resize(600, 480, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('public/products/' . $count . $unique_time . '_medium.' . $i->getClientOriginalExtension(), 60);
                /**
                 * making thumbnail of 80x80
                 */
                $productImages = new ProductImage;
                $productImages->name = $count . $unique_time . '.' . $i->getClientOriginalExtension();
                $productImages->product_id = $productId;
                $productImages->path = url('public/products/' . $count . $unique_time . '.' . $i->getClientOriginalExtension());
                $productImages->path_thumb = url('public/products/' . $count . $unique_time . '_thumb.' . $i->getClientOriginalExtension());
                $productImages->path_medium = url('public/products/' . $count . $unique_time . '_medium.' . $i->getClientOriginalExtension());
                $productImages->save();
            }
        }
        return url('admin/products/productImages/' . $productId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::find($id);
        return view('Admin.product.detail')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['product'] = Product::find($id);
        $data['categories'] = Category::select('ID', 'name')->get();
        $data['users'] = User::select('ID', 'name')->get();
        return view('Admin.product.edit')->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->status = $request->status;
        $product->title = $request->title;
        $product->user_id = $request->user_id;
        $product->quantity_available = $request->quantity_available;
        $product->price = $request->price;
        $product->sort_order = $request->sort_order;
        $product->save();
        Session::flash('info', 'The produuct was Updated successfully');
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $product = Product::find($id);
        return view('Admin.product.delete')->withProduct($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $Product = Product::find($id)->delete();
        Session::flash('danger', 'The produuct was deleted successfully');
        return redirect('admin/products');
    }

    function productImages($id) {
        //making primary image for new product images
        $productPrimaryImages = ProductImage::select('id')->where('product_id', '=', $id)->get();
        if (count($productPrimaryImages) > 0) {
            $productPrimaryImages = ProductImage::select('id')->where('is_primary', '=', 1)->where('product_id', '=', $id)->get();

            if (count($productPrimaryImages) < 1) {
                $productImage = ProductImage::where('is_primary', '=', 0)->where('product_id', '=', $id)->first();
                $productImage->is_primary = 1;
                $productImage->save();
//            return $productImage;
            }
        }
        $Product = Product::find($id);

        return view('Admin.product.images')->withProduct($Product);
    }

    function deleteProductImage($imageId, $productId) {
        $fileName = ProductImage::find($imageId);
        if (File::exists($fileName->path)) {
            File::delete($fileName->path);
            echo "found";
        } else {
            echo "not found";
        }
        return $fileName->path;


        File::Delete($fileName->path_thumb);
        File::Delete($fileName->path_medium);
        ProductImage::find($imageId)->delete();
        Session::flash('danger', 'The produuct image was deleted successfully');
        return redirect('admin/products/productImages/' . $productId);
    }

    function makePrimaryImage($imageId, $productId) {
        //removing old primary image BIT
        $productImage = ProductImage::select('id')->where('is_primary', '=', 1)->where('product_id', '=', $productId)->first();
        $productImage->is_primary = 0;
        $productImage->save();
        //making new primary image BIT
        $productImage = ProductImage::find($imageId);
        $productImage->is_primary = 1;
        $productImage->save();
        Session::flash('info', 'The produuct primary image was updated successfully');
        return redirect('admin/products/productImages/' . $productId);
    }

    /*
     * Product Atrributes Get Reques
     */

    function productAttributesGet($productId) {
        $Product = Product::find($productId);
        $productAttribute = ProductAttribute::all();
        return view('Admin.product.attributes')->withProduct($Product)->with('ProductAttribues', $productAttribute);
    }

    /*
     * Product Atrributes POST Request
     */

    function productAttributesPost(Request $request) {
        $productAttribute = new ProductAttribute;
        $productAttribute->name = $request->name;
        $productAttribute->product_id = $request->productId;
        $productAttribute->values = $request->values;
        $productAttribute->save();
        Session::flash('success', 'The produuct attribute was added successfully');
        return redirect('admin/products/' . $request->productId . '/attributes');
    }

    /*
     * Product Atrributes POST Request
     */

    function deleteAttributes($attributeId, $productID) {
        ProductAttribute::find($attributeId)->delete();
        Session::flash('danger', 'The produuct attribute was deleted successfully');
        return redirect('admin/products/' . $productID . '/attributes');
    }

    function getPrimaryImage($productID) {
        $productImage = ProductImage::select('id', 'NAME', 'PATH')->where('is_primary', '=', 1)->where('product_id', '=', $productID)->first();
        return $productImage;
    }

    function bulk_delete(Request $request) {

        if (count($request->id) > 0) {
            $countProducts = 0;
            foreach ($request->id as $i) {
                $Product = Product::find($i)->delete();
                $countProducts++;
            }
            Session::flash('danger', $countProducts . ' produucts were deleted successfully');
            return redirect('admin/products');
        } else {
            Session::flash('danger', 'No products were selected for delete');
            return redirect('admin/products');
        }
    }

    function product_tags(){
            
    }

}
