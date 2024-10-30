<?php

namespace App\Http\Controllers\marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromptGeneration;

class MarketplaceController extends Controller
{

    public function shop()
    {
        $data = ["title" =>"Marketplace  | Prompt Xchange"];
        $promptGenerations = PromptGeneration::with(['user', 'generatedImages'])->paginate(10);
        return view('front.marketplace.shop',$data ,compact('promptGenerations'));

    }


}
