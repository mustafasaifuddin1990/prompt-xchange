<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class CmsController extends Controller
{

    public function contact_page()
    {
//        $contact_Settings =  ContactSetting::
        $data =  ["title" => 'Contact Settings'];
        return view('backend.cms.contact-page' ,$data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'email' => 'required|email',
            'heading' => 'required|string',
            'placeholders.name' => 'required|string',
            'placeholders.email' => 'required|string',
            'placeholders.phone' => 'required|string',
            'placeholders.subject' => 'required|string',
            'placeholders.message' => 'required|string',
        ]);

        $settings = ContactSetting::firstOrCreate([]);
        $settings->update([
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'heading' => $request->input('heading'),
            'placeholders' => $request->input('placeholders'),
        ]);

        return response()->json(['success' => 'Contact settings updated successfully.']);
    }

}
