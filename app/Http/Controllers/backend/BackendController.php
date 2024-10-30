<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use App\Models\User;
use Carbon\Carbon;
use App\Models\PromptCategory;
use App\Models\PromptGeneration;
use App\Models\GeneratedImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        $data = ["title" =>"Dashboard | Prompt Xchange"];
        return view('backend.account-dashboard',$data);
    }

      public  function profile_update()
    {
        $data = ["title" =>"Profile Update | Prompt Xchange"];
        return view('backend.user.profile-update',$data);

    }
    public function viewProfile(Request $request)
    {
        $profile = User::find($request->user_id);
        $profile->increment('views_count');

        return response()->json(['success' => true]);
    }

    public function commentProfile(Request $request)
    {
        $profile = User::find($request->user_id);
        $profile->increment('comments_count');

        return response()->json(['success' => true]);
    }

       public function my_prompts()
    {
        $data = ["title" =>"Prompts | Prompt Xchange"];
        $userId = auth()->id();
    $promptGenerations = PromptGeneration::where('user_id', $userId)
        ->with('generatedImages')
        ->get();
        return view('backend.user.my-prompts-generation',$data  ,compact('promptGenerations'));

    }
    public function updatePrompt(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:prompt_generations,id',
            'price' => 'required|numeric',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:prompt_categories,id',
        ]);
        $promptGeneration = PromptGeneration::find($validated['id']);
        $promptGeneration->price = $validated['price'];
        $promptGeneration->category = json_encode($validated['categories']);
        $promptGeneration->save();
        return response()->json(['success' => true, 'message' => 'Prompt updated successfully!']);
    }


     public function updateProfile(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'user_phone' => 'required|string|max:15',
            'user_country' => 'required|string|max:255',
            'user_city' => 'required|string|max:255',
            'user_state' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        $user = Auth::user();
        $user->name = $request->input('customer_name');
        $user->phone = $request->input('user_phone');
        $user->country = $request->input('user_country');
        $user->city = $request->input('user_city');
        $user->state = $request->input('user_state');
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/profile_pictures');
            $image->move($destinationPath, $name);

            // Save the image path in the database
            $user->user_picture = '/uploads/profile_pictures/' . $name;
        }
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully!'
        ]);
    }


public  function create_subscription ()
{
    $data = ["title" =>"Create Subscription  | Prompt Xchange"];
    return view('backend.subscriptions.create',$data);

}

    public function get_subs()
    {
        $subscriptions = Pricing::all();
        return response()->json($subscriptions);
    }

    public  function list_subscription ()
    {
        $data = ["title" =>"Subscriptions  | Prompt Xchange"];
        return view('backend.subscriptions.list',$data);

    }

    public function store_subscription(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'features' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $price = Pricing::create([
                'name' => $request->name,
                'price' => $request->price,
                'features' => $request->features,
            ]);

            return response()->json(['success' => 'Pricing added successfully!', 'price' => $price], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while saving the pricing.'], 500);
        }
    }



    public function edit($id)
    {
        $data = ["title" => "Edit Pricing  | Prompt Xchange"];
        $subscription = Pricing::findOrFail($id);
        return view('backend.subscriptions.edit', compact('subscription') ,$data);
    }



    public function update_subscription(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'features' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $price = Pricing::findOrFail($id);
            $price->update([
                'name' => $request->name,
                'price' => $request->price,
                'features' => $request->features,
            ]);

            return response()->json(['success' => 'Pricing updated successfully!', 'price' => $price], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Pricing not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the pricing.'], 500);
        }
    }


    public function destroy_subscription($id)
    {
        try {
            $price = Pricing::findOrFail($id);
            $price->delete();

            return response()->json(['success' => 'Pricing deleted successfully!'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Pricing not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the pricing.'], 500);
        }
    }



//     public function testApi(Request $request)
// {

//      $request->validate([
//         'file' => 'nullable|file|mimes:jpg,png,jpeg',
//         'inpainting' => 'nullable|file|mimes:jpg,png,jpeg',
//     ]);
//     $model =  $request->model_name;
//     $image_prompt = $request->file('image_prompt');
//     $inpainting = $request->file('inpainting');
//     $positive_prompt = $request->positive_prompt;
//     $negative_prompt = $request->negative_prompt;
//     $num_inference_steps = $request->steps;
//     $guidance_scale  = $request->cdg_scale;
//     $samples =  $request->samples;

//     if (empty($image_prompt) && empty($inpainting)) {

//         $response = Http::withHeaders([
//             'Content-Type' => 'application/json',
//         ])->post('https://modelslab.com/api/v3/text2img', [
//             'key' => 'HlUWYMUSIX0oQHHdmOJCI4ECICejcJxbcZuwdr15cie9hEMTHxJubfeuRSnP',
//             'prompt' => $positive_prompt,
//             'negative_prompt' => $negative_prompt,
//             'width' => '1024',
//             'height' => '1024',
//             'samples' => $samples,
//             'num_inference_steps' => $num_inference_steps,
//             'guidance_scale' => $guidance_scale,

//         ]);
//     } elseif (!empty($image_prompt)) {

//         $imageName = time() . '.' . $image_prompt->getClientOriginalExtension();
//         $imagePath = $image_prompt->storeAs('public/image_prompt_images', $imageName);
//         $imageUrl = asset('storage/image_prompt_images/' . $imageName);


//         $response = Http::withHeaders([
//             'Content-Type' => 'application/json',
//         ])->post('https://modelslab.com/api/v3/img2img', [
//             'key' => 'HlUWYMUSIX0oQHHdmOJCI4ECICejcJxbcZuwdr15cie9hEMTHxJubfeuRSnP',
//             'prompt' => $positive_prompt,
//             'negative_prompt' => $negative_prompt,
//             'init_image' => $imageUrl,
//             'width' => '1024',
//             'height' => '1024',
//             'samples' => $samples,
//             'num_inference_steps' => $num_inference_steps,
//             'guidance_scale' => $guidance_scale,
//             'strength' => 0.7,

//         ]);
//     } elseif (!empty($inpainting)) {

//         $inpainting_imageName = time() . '.' . $inpainting->getClientOriginalExtension();
//         $inpaing_imagePath = $image_prompt->storeAs('public/inpaint_images', $inpainting_imageName);
//         $inpaint_imageUrl = asset('storage/inpaing_images/' . $inpainting_imageName);

//         $response = Http::withHeaders([
//             'Content-Type' => 'application/json',
//         ])->post('https://modelslab.com/api/v6/realtime/inpaint', [
//             'key' => 'HlUWYMUSIX0oQHHdmOJCI4ECICejcJxbcZuwdr15cie9hEMTHxJubfeuRSnP',
//             'prompt' => $positive_prompt,
//             'negative_prompt' => $negative_prompt,
//             'init_image' => "$inpaint_imageUrl",
//             'mask_image' => "https://raw.githubusercontent.com/CompVis/stable-diffusion/main/data/inpainting_examples/overture-creations-5sI6fQgYIuo_mask.png" ,
//             'width' => '1024',
//             'height' => '1024',
//             'samples' => $samples,
//             'temp' => 'yes',
//             'safety_checker'=>'no',
//             'num_inference_steps' => $num_inference_steps,
//             'guidance_scale' => $guidance_scale,
//             'strength' => 0.7,
//             'seed' =>null,
//             'webhook'=> null,
//             'track_id'=> null

//         ]);
//     }

//     if ($response->successful()) {
//         $result = $response->json();
//         return response()->json($result);
//     } else {
//         $error = $response->body();
//         return response()->json(['error' => $error], $response->status());
//     }
// }

    public function get_prompt_categories()
    {
        $prompt_categories = PromptCategory::orderBy('category_name', 'asc')->get();
        return response()->json($prompt_categories);
    }


    public function testApi(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'file' => 'nullable|file|mimes:jpg,png,jpeg',
        'inpainting' => 'nullable|file|mimes:jpg,png,jpeg',
        'model_name' => 'required|string|in:SDXL,Flux',
        'samples' => 'required|integer|min:1',
        'positive_prompt' => 'required|string',
        'negative_prompt' => 'nullable|string',
        'steps' => 'required|integer|min:1',
        'cdg_scale' => 'required|numeric|min:0',
    ]);

    // Extract validated data
    $userId = auth()->id();
    $model = $validatedData['model_name'];
    $samples = $validatedData['samples'];
    $positive_prompt = $validatedData['positive_prompt'];
    $negative_prompt = $validatedData['negative_prompt'] ?? '';
    $num_inference_steps = $validatedData['steps'];
    $guidance_scale = $validatedData['cdg_scale'];
    $image_prompt = $request->file('file');
    $inpainting = $request->file('inpainting');

    // Get base URL based on the model name
    $baseUrl = $this->getModelBaseUrl($model);

    // Prepare the request body and endpoint based on the inputs
    if (empty($image_prompt) && empty($inpainting)) {
        $endpoint = '/text2img';
        $requestData = [
            'key' => 'BQyR1BsqLEVgmwoYk9gT422Vw1bbFE2V1re9gLvscgq2m02Lvl6IUgTB2JbI',
            'prompt' => $positive_prompt,
            'negative_prompt' => $negative_prompt,
            'width' => '1024',
            'height' => '1024',
            'samples' => $samples,
            'num_inference_steps' => $num_inference_steps,
            'guidance_scale' => $guidance_scale,
        ];
    } elseif (!empty($image_prompt)) {
        $imageName = time() . '.' . $image_prompt->getClientOriginalExtension();
        $imagePath = $image_prompt->storeAs('public/image_prompt_images', $imageName);
        $imageUrl = asset('storage/image_prompt_images/' . $imageName);

        $endpoint = '/img2img';
        $requestData = [
            'key' => 'BQyR1BsqLEVgmwoYk9gT422Vw1bbFE2V1re9gLvscgq2m02Lvl6IUgTB2JbI',
            'prompt' => $positive_prompt,
            'negative_prompt' => $negative_prompt,
            'init_image' => $imageUrl,
            'width' => '1024',
            'height' => '1024',
            'samples' => $samples,
            'num_inference_steps' => $num_inference_steps,
            'guidance_scale' => $guidance_scale,
            'strength' => 0.7,
        ];
    } elseif (!empty($inpainting)) {
        $inpainting_imageName = time() . '.' . $inpainting->getClientOriginalExtension();
        $inpainting_imagePath = $inpainting->storeAs('public/inpaint_images', $inpainting_imageName);
        $inpaint_imageUrl = asset('storage/inpaint_images/' . $inpainting_imageName);

        $endpoint = '/realtime/inpaint';
        $requestData = [
            'key' => 'BQyR1BsqLEVgmwoYk9gT422Vw1bbFE2V1re9gLvscgq2m02Lvl6IUgTB2JbI',
            'prompt' => $positive_prompt,
            'negative_prompt' => $negative_prompt,
            'init_image' => $inpaint_imageUrl,
            'mask_image' => "https://raw.githubusercontent.com/CompVis/stable-diffusion/main/data/inpainting_examples/overture-creations-5sI6fQgYIuo_mask.png",
            'width' => '1024',
            'height' => '1024',
            'samples' => $samples,
            'num_inference_steps' => $num_inference_steps,
            'guidance_scale' => $guidance_scale,
            'strength' => 0.7,
        ];
    }

    // Make the API request
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post($baseUrl . $endpoint, $requestData);

    // Handle the response
    if ($response->successful()) {
        $result = $response->json();
        $promptGeneration = PromptGeneration::create([
            'user_id' => $userId,
            'model_name' => $model,
            'positive_prompt' => $positive_prompt,
            'negative_prompt' => $negative_prompt,
            'samples' => $samples,
            'steps' => $num_inference_steps,
        ]);

        foreach ($result['output'] as $imageUrl) {
            $imageContent = file_get_contents($imageUrl);
            $imageName = time() . '_' . uniqid() . '.jpg';
            $imagePath = storage_path('app/public/generated_images/' . $imageName);
            file_put_contents($imagePath, $imageContent);
            $promptGeneration->generatedImages()->create([
                'image_url' => asset('storage/generated_images/' . $imageName),
            ]);
        }

        return response()->json($result);
    } else {
        $error = $response->body();
        return response()->json(['error' => $error], $response->status());
    }
}

private function getModelBaseUrl($model)
{
    $modelBaseUrls = [
        'SDXL' => 'https://modelslab.com/api/v3',
        'Flux' => 'https://modelslab.com/api/v4',
    ];

    return $modelBaseUrls[$model] ?? 'https://modelslab.com/api/v3'; // Default to SDXL if no match found
}

        public function chatUser(){

            $data =  [
                'title' => 'Chat | Prompt Xchange'
            ];

            return view('backend.chat.chat' ,$data);
        }


    public function getUsersByRole()
    {
        $users = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select(
                DB::raw('MONTH(users.created_at) as month'),
                DB::raw('MONTHNAME(users.created_at) as month_name'),
                'roles.slug  as role',
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('users.created_at', 2024)
            ->groupBy(DB::raw('MONTH(users.created_at)'), DB::raw('MONTHNAME(users.created_at)'), 'roles.slug')
            ->orderBy(DB::raw('MONTH(users.created_at)'))
            ->get();

        $formattedData = [
            'content_creator' => [],
            'general_user' => []
        ];
        foreach ($users as $user) {

            if ($user->role === 'content_creator') {
                $formattedData['content_creator'][] = [$user->month_name, $user->total];
            } elseif ($user->role === 'general_user') {
                $formattedData['general_user'][] = [$user->month_name, $user->total];
            }
        }

        // Return data as JSON
        return response()->json($formattedData);
    }


}
