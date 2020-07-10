<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\Author;
use App\Category;
use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('home',compact('categories','authors'));
    }

    public function aboutus()
    {
        $aboutus = AboutUs::first();
        //dd($aboutus);
        return view("site.pages.aboutus.aboutus",compact('aboutus'));
    }

    public function contactus()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view("site.pages.contactus.contactus",compact('categories','authors'));
    }

    public function contactusValidator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'email' => 'required|email',
            'content' => 'required',
        ],
            [
                'title.required' => 'الاسم مطلوب',
                'title.max' => 'العنوان يجب أن لا يزيد عن 250 حرف',
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
                'content.required'=>'الرسالة مطلوبة'
            ]);
    }

    public function contactusAdd(Request $request)
    {
        $validator = $this->contactusValidator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $contactus = ContactUs::create([
            'title' => $request['title'],
            'email' => $request['email'],
            'content' => $request['content'],
        ]);
        $request->session()->flash('success', "تم ارسال الرسالة بنجاح، شكراً لتواصلك معنا");
        //session()->flash('success', __('تم ارسال الرسالة بنجاح، شكراً لتواصلك معنا'));
        return redirect('/contactus');

    }
}
