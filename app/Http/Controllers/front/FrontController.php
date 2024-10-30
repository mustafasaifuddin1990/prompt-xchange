<?php

namespace App\Http\Controllers\front;
use App\Models\GeneratedImage;
use App\Models\Likes;
use App\Models\Blog;
use App\Models\ProfileViews;
use App\Models\Pricing;
use App\Models\PromptCategory;
use App\Models\PromptGeneration;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home()
    {
        $data = ['title' =>"Home | Prompt Xchange"];
        return view('front.home' ,$data);
    }
    public function about(){
         $data = ['title' =>"About us | Prompt Xchange"];
        return view('front.about.aboutus' ,$data);
    }
    public function contactus(){
         $data = ['title' =>"Contact us | Prompt Xchange"];
        return view('front.contact.contact' ,$data);
    }
    public function pricing(){
         $data = ['title' =>"Pricing | Prompt Xchange"];
         $subscriptions =  Pricing::all();
        return view('front.pricing' ,$data ,compact('subscriptions'));
    }
     public function discover(){
          $data = ['title' =>"Discover | Prompt Xchange"];
        return view('front.discover',$data);
    }
    public function hire(){

        $creators = User::whereHas('roles', function($query) {
            $query->where('slug', 'content_creator');
        })->with('user_likes')->get();
        foreach ($creators as $creator) {
            $creator->heart_likes_count = $creator->heartLikesCount();
        }
        $data = ['title' =>"Hire | Prompt Xchange"];
        return view('front.creators.creators',$data ,compact('creators'));
    }
    public function generation_single($id)
    {
        $data = ['title' => "Generation Single | Prompt Xchange"];
        $promptGeneration = PromptGeneration::with('generatedImages', 'promptCategory')->findOrFail($id);
        $get_user = User::where('id', $promptGeneration->user_id)->first();
        $user_data = [
            'user_name' => $get_user->name,
            'user_slug' => $get_user->user_slug,
            'email' => $get_user->email,
            'country' => $get_user->country,
            'city' => $get_user->city,
            'state' => $get_user->state,
            'user_profile_picture' => $get_user->user_picture,
        ];

        $category_ids = json_decode($promptGeneration->category, true) ?? [];
        $categories = PromptCategory::whereIn('id', $category_ids)->pluck('category_name', 'id');
        return view('front.creators.generation-single', array_merge($data, compact('promptGeneration', 'user_data', 'categories', 'id')));
    }


    public function creator_single($slug){

        $profile = User::where('user_slug', $slug)->firstOrFail();
        if (auth()->check()) {
            $current_user_id = Auth::user()->id;
            $this->increase_view($current_user_id, $profile->id);
        }else{
            $current_user_id = '';
        }
        $get_liked_details = Likes::where('user_id' , $current_user_id)
            ->where('post_id' , $profile->id)
            ->where('item_type','profile')
            ->first();

        $get_profile_likes = Likes::where('post_id' , $profile->id)
            ->where('item_type','profile')
            ->where('liked' , "heart")
            ->get();
        $all_count = $get_profile_likes->count();
        $get_data_profile = ProfileViews::where('profile_id', $profile->id)
            ->get();
        $view_profile_count = $get_data_profile->count();

        $promptGenerations = PromptGeneration::where('user_id', $profile->id)
            ->with('generatedImages' ,'promptCategory')
            ->get();

        $promptCategories = PromptCategory::all();
        $name =  $profile->name;
        $profile_picture = $profile->user_picture;
        $data = [
            'title' => "Creator | " . $profile->name,
            'user' => $name,
            'profile_picture' => $profile_picture,

        ];
        return view('front.creators.creator-single', $data,compact('view_profile_count','promptGenerations','promptCategories' ,'profile', 'get_liked_details', 'all_count'));
    }
    protected function increase_view($user_id, $profile_id){

        $get_data_profile = ProfileViews::where('user_id', $user_id)
            ->where('profile_id', $profile_id)
            ->first();

        if (!$get_data_profile){

            $create_view = new ProfileViews();
            $create_view->user_id = $user_id;
            $create_view->profile_id = $profile_id;
            $create_view->view = 1;
            $create_view->save();

            return response()->json(data:['view' => 'created'], status: 200);
        }
        return response()->json(data:['view' => 'viewed'], status: 400);
    }

    public function blogs(){
          $data = ['title' =>"Blogs | Prompt Xchange"];
        $blogs = Blog::with('category')->paginate(6);
        return view('front.blogs.blogs',$data,compact('blogs'));
    }
    public function blogs_details($slug){
         $data = ['title' =>" $slug | Prompt Xchange"];
        $blog_single = Blog::with('category')->where('slug', $slug)->firstOrFail();
        $latest_blogs = Blog::where('slug', '!=', $slug)
            ->orderBy('publish_date', 'desc')
            ->take(3) // Adjust the number of blogs you want to display
            ->get();
        return view('front.blogs.blog-details',$data ,compact('blog_single' ,'latest_blogs'));
    }
      public function create(){
        $data = ['title' =>"Create | Prompt Xchange"];
        return view('front.createprompt.create',$data);
    }
}
