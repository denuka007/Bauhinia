<?php

namespace App\Http\Controllers\Adminn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('adminn.products.index', compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        return view('adminn.products.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $products = new Product();
        if($request->hasfile('image'))
        {

            $filename = time() . "." . $request->image->extension();
            $request->image->move(public_path('assets/uploads/products'), $filename);
            $products->image = $filename;

        }

        $products->name = $request->input('name');
        $products->cate_id = $request->input('cate_id');
        $products->description = $request->input('description');
        $products->status = $request->input('status') == TRUE ? '1':'0';
        $products->trending = $request->input('trending') == TRUE ? '1':'0';
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->save();
        return redirect('products')->with('status',"Product Added Successfully");


    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('adminn.products.edit', compact('products'));
    }

    public function update(Request $request,$id)
    {
        $products = Product::find($id);

        if($request->hasfile('image'))

        $path = 'assets/uploads/products/'.$products->image;
            if(file::exists($path))
            {
                file::delete($path);
            }

        {

            $filename = time() . "." . $request->image->extension();
            $request->image->move(public_path('assets/uploads/products'), $filename);
            $products->image = $filename;

        }

        $products->name = $request->input('name');
        //$products->cate_id = $request->input('cate_id');
        $products->description = $request->input('description');
        $products->status = $request->input('status') == TRUE ? '1':'0';
        $products->trending = $request->input('trending') == TRUE ? '1':'0';
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->update();

        return redirect('products')->with('status',"Product Update Successfully");
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $path = 'assets/uploads/products/'.$products->image;
            if(file::exists($path))
            {
                file::delete($path);
            }

            $products->delete();
            return redirect('products')->with('status',"Product Delete Successfully");

    }
}
