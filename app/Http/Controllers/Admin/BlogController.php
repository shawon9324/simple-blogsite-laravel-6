<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Blog;
use Session;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{

    public function index()
    {
        $data['blogs'] =  Blog::with('category')->orderBy('id', 'desc')->get();

        return view('web.blog_list')->with($data);
    }


    public function create()
    {
        $data['categories'] =  Category::orderBy('category_name')->get();

        return view('web.add_blog')->with($data);
    }

    public function store(Request $request)
    {
        $blogData = $this->validateRequest();

        $blogData['slug'] = Str::slug($request->blog_title);
        if ($request->hasFile('image')) {

            $blogData['image'] = $this->uploadImage($request->file('image'));

            //echo $blogData['image'];
            // exit;
        } else {
            $blogData['image'] = 'default.png';
        }
        if (Blog::create($blogData)) {
            Session::flash('response', array('type' => 'success', 'message' => 'New Blog Added successfully!'));
            return redirect(route('homepage'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            return redirect(route('blog.create'));
        }


        

    }


    public function show($id)
    {
        $data['blog'] = Blog::with('category')->findOrFail($id);
        return view('web.single')->with($data);
    }


    public function edit(Blog $blog)
    {
        //return $blog;
        $data['categories'] =  Category::orderBy('category_name')->get();
        $data['blog'] = $blog;

        return view('web.edit_blog')->with($data);
    }


    public function update(Request $request, Blog $blog)
    {

        $blogData = $this->validateRequest();
        if ($request->hasFile('image')) {
            $blogData['image'] = $this->updateImage($request->file('image'), $blog);
        }
        $blogData['blog_title'] = $request->blog_title;
        $blogData['blog_description'] = $request->blog_description;
        $blogData['category_id'] = $request->category_id;


        if ($blog->update($blogData)) {
            Session::flash('response', array('type' => 'success', 'message' => ' Blog Updated successfully!'));
            return redirect(route('blog.show',$blog->id));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        Session::flash('response', array('type' => 'success', 'message' => ' Blog Deleted successfully!'));
        return redirect(route('blog.index',$blog->id));
        
    }

    private function uploadImage($image)
    {
        $timestemp = time();
        $imageName = $timestemp . '.' . $image->getClientOriginalExtension();

        $path = public_path('uploads/blog/') . 'image_' . $imageName;
        Image::make($image)->save($path);
        return 'image_' . $imageName;
    }

    private function updateImage($image, $blog)
    {
        if (file_exists(storage_path('app/public/uploads/blog/' . $blog->image))) {
            unlink(storage_path('app/public/uploads/blog/' . $blog->image));
        }

        $timestemp = time();
        $imageName = $timestemp . '.' . $image->getClientOriginalExtension();
        $path = public_path('uploads/blog/') . 'image_' . $imageName;
        Image::make($image)->save($path);
        return 'image_' . $imageName;
    }

    private function validateRequest()
    {
        return request()->validate([
            'blog_title'    => 'required',
            'category_id'   => 'required',
            'blog_description' => 'required',
            'image' => 'sometimes|image|max:5000',
        ]);
    }
}