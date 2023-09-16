<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{

    public function index(Request $request)
    {
        if(isset($request->status)){
            $contactUs = ContactUs::where('seen',$request->status)->latest()->paginate(20);

        }else{
            $contactUs = ContactUs::latest()->paginate(20);

        }
        return view('admin.contactUs.index',compact('contactUs'));
    }


    public function seen(ContactUs $contactUs)
    {
        $contactUs->update([
            'seen' => 1
        ]);

        return response()->json($contactUs->id,200);

    }

    public function destroy(Request $request,$contactUs)
    {

        ContactUs::where('id',$contactUs)->first()->delete();

        $request->session()->flash('success','پیام مورد نظر حذف شد');
        return redirect()->route('admin.contactUs.index');
    }
}
