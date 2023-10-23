<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Admin;
use App\Mail\Websitemail;

class ContactController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id',1)->first();
        return view('front.contact', compact('page_data'));
    }

    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if(!$validator->passes()) {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        } else {

            // Send email
            $subject = 'Письмо из контактов ';
            $message = ' Информация от посетителя: <br>';
            $message .= '<br>Имя: '.$request->name;
            $message .= '<br>Адрес эл.почты: '.$request->email;
            $message .= '<br>Послание: '.$request->message;

            $admin_data = Admin::where('id',1)->first();
            $admin_email = $admin_data->email;

            \Mail::to($admin_email)->send(new Websitemail($subject,$message));

            return response()->json(['code'=>1,'success_message'=>'Эл.письмо успешно отправлено']);
        }

    }
}
