<?php

namespace App\Http\Controllers\Adminn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('adminn.category.index',compact('category'));
    }

    public function add()
    {
        return view('adminn.category.add');
    }

    public function insert(Request $request)
    {
        $category = new Category();
        if($request->hasfile('image'))
        {

            $filename = time() . "." . $request->image->extension();
            $request->image->move(public_path('assets/uploads/category'), $filename);
            $category->image = $filename;

            //$file = $request->file('image');
            //$extension = $file->getClientOriginalExtension();
            //$filename = time().'.'.$extension;
            //$file->move('assets/uploads/category'.$filename);
            //$category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('Slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keyword = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');
        $category->save();
        return redirect('/dashboard')->with('status',"Category Added Successfully");

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('adminn.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(file::exists($path))
            {
                file::delete($path);
            }

            $filename = time() . "." . $request->image->extension();
            $request->image->move(public_path('assets/uploads/category'), $filename);
            $category->image = $filename;

            //$file = $request->file('image');
            //$extension = $file->getClientOriginalExtension();
            //$filename = time().'.'.$extension;
            //$file->move('assets/uploads/category'.$filename);
            //$category->image = $filename; 

        }

        $category->name = $request->input('name');
        $category->slug = $request->input('Slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keyword = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');
        $category->update();
        return redirect('dashboard')->with('status',"Category Update Successfull");
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }

        $category->delete();
        return redirect('categories')->with('status',"Category Deleted Successfully");
    }
}
