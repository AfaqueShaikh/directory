<?php

namespace App\Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers\GeneralHelper;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\ProductTrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::all();
        return view("Products::index", compact('items'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addProduct()
    {

        $category = Category::where('parent_id', 0)
        ->where('active', 1)
        ->where('category_type', 'marketplace')
        ->get();


        return view("Products::add", compact('category'));
    }

    public function storeProduct(Request $request)
    {
        $validator = $request->validate(
            [
                'category_id' => 'required',
//                'name' => ['required', new CategoryValidationRule($request->parent_id, '')],
                'name' => ['required'],
                'description' => 'required',
                'price' => 'required|numeric|gt:0',
                'image' => 'mimes:jpeg,png,jpg,gif',
            ],
            [
                'category_id.required' => 'Please select category',
                'name.required' => 'Please enter name',
                'description.required' => 'Please enter description',
                'price.required' => 'Please enter price',
                'image.required' => 'Please select image',
            ]
        );

        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->category_id = $request->category_id;
        $product->slug = GeneralHelper::seoUrl($request->name);
        $product->price = $request->price;

        $product->active = false;
        if ($request->active) {
            $product->active = true;
        }
        $product->save();

        // Trans
        $productTrans = new ProductTrans();

        $productTrans->product_id = $product->id;
        $productTrans->name = $request->name;
        $productTrans->description = $request->description;
        $productTrans->lang = 'en';

        if($request->file('image')){
            $path = public_path().'/uploads/products';
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
//            $data['image']= $filename;
            $productTrans->image = $filename;
        }

        $productTrans->save();

        return redirect()
            ->route('admin.products')
            ->with('message', 'Product added successfully.');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editProduct($id)
    {
        $category = Category::where('parent_id', 0)
            ->where('active', 1)
//            ->where('id', '<>', $id)
            ->get();
        $item = Product::find($id);
        return view("Products::edit", compact('category', 'item'));
    }
    /**
     * @param
     * @return
     */
    public function updateProduct(Request $request, $id)
    {
//dd($request->all());
        $validator = $request->validate(
            [
                'category_id' => 'required',
//                'name' => ['required', new CategoryValidationRule($request->parent_id, '')],
                'name' => ['required'],
                'description' => 'required',
                'price' => 'required|numeric|gt:0',
                'image' => 'mimes:jpeg,png,jpg,gif',
            ],
            [
                'category_id.required' => 'Please select category',
                'name.required' => 'Please enter name',
                'description.required' => 'Please enter description',
                'price.required' => 'Please enter price'
            ]
        );


        $product = Product::find($id);

        $product->user_id = auth()->user()->id;
        $product->category_id = $request->category_id;
        $product->slug = GeneralHelper::seoUrl($request->name);
        $product->price = $request->price;

        $product->active = false;
        if ($request->active) {
            $product->active = true;
        }

        $product->save();

        // Translation
        $productTrans = ProductTrans::where('product_id', $product->id)->where('lang', 'en')->first();
        if (empty($productTrans)) {
            $productTrans = new ProductTrans();
            $productTrans->product_id = $product->id;
            $productTrans->lang = 'en';
        }
        $productTrans->name = $request->name;
        $productTrans->description = $request->description;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
//            $data['image']= $filename;
            if (isset($request->old_image) && @file_exists(public_path('uploads/products/'.$request->old_image))) {
                @unlink(public_path('uploads/products/'.$request->old_image));
            }
            $productTrans->image = $filename;
        }

        $productTrans->save();

        return redirect()
            ->route('admin.products')
            ->with('message', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if($product){
            if (isset($product->trans->img) && @file_exists(public_path('uploads/products/'.$product->trans->img))) {
                @unlink(public_path('uploads/products/'.$product->trans->img));
            }
            ProductTrans::where('product_id', $id)->delete();
            Product::where('id',$id)->delete();
            return redirect()
                ->route('admin.products')
                ->with('message', 'Product deleted successfully.');
        } else {
            return redirect()
                ->route('admin.products')
                ->with('message', 'Product delete failed.');
        }
    }

}
