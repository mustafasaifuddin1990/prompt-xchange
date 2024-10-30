<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Pricing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = ["title" =>"Blogs | Prompt Xchange"];
        return view('backend.blogs.list', $data);
    }

    public function get_blogs()
    {
        $blogs = Blog::with('category')->get();;
        return response()->json($blogs);
    }


    public function create_blogs()
    {
        $data = ["title" =>" Blog Create | Prompt Xchange"];
        return view('backend.blogs.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_image' => 'required|image',
            'blog_desc' => 'required',
            'category' => 'required'
        ]);

        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs');
            $image->move($destinationPath, $name);
        }

        Blog::create([
            'title' => $request->blog_title,
            'slug' =>Str::slug($request->blog_title),
            'image' => '/uploads/blogs/' . $name,
            'content' => $request->blog_desc,
            'publish_date' => Carbon::now()->toDateString(), // Use the current date
            'reading_time' => $request->reading_time ?? '4',
            'category_id' =>$request->category
        ]);

        return response()->json(['success' => 'Blog added successfully.']);
    }

            public function edit($id)
        {
            $blog = Blog::with('category')->find($id);
            $categories = Category::all();  // Fetch all categories

            if (!$blog) {
                return response()->json(['success' => false, 'message' => 'Blog not found'], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'blog' => $blog,
                    'categories' => $categories  // Pass all categories
                ]
            ]);
        }



    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        $request->validate([
            'blog_title' => 'required',
            'blog_image' => 'required|image',
            'blog_content' => 'required',
            'category' => 'required'
        ]);

          if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs');
            $image->move($destinationPath, $name);
        }

        $blog->update([
            'title' => $request->blog_title,
            'slug' =>Str::slug($request->blog_title),
            'image' => '/uploads/blogs/' . $name,
            'content' => $request->blog_content,
            'publish_date' => Carbon::now()->toDateString(),
            'reading_time' => $request->reading_time ?? '4',
            'category_id' =>$request->category
        ]);

        return response()->json(['success' => 'Blog updated successfully.']);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return response()->json(['success' => 'Blog deleted successfully.']);
    }
}
