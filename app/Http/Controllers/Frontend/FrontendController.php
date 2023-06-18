<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending','1')->take(4)->get();
        $popular_category = Category::where('popular','1')->take(4)->get();
        //$category = Category::all();
        return view('frontend.index' , compact('featured_products','popular_category'));
    }

    public function category()
    {
        $category = Category::where('status','0')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
           $category = Category::where('slug',$slug)->first();
           $products = Product::where('cate_id',$category->id)->where('status','0')->get();
           return view('frontend.products.index', compact('category','products'));
        }
        else
        {
            return redirect('/')->with('status',"Category Does not Exists");
        }
    }

    public function productview($cate_slug,$prod_name)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('name',$prod_name)->exists())
            {
                $products = Product::where('name',$prod_name)->first();
                return view('frontend.products.view', compact('products'));
            }
            else
            {
                return redirect('/')->with('status',"Product Not Founded");
            }
        }
        else
            {
                return redirect('/')->with('status',"No such Category");
            }
    }
}
