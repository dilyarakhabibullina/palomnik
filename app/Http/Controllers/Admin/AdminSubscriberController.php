<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;

class AdminSubscriberController extends Controller
{
    public function show()
    {
        $all_subscribers = Subscriber::where('status',0)->get();
        return view('admin.subscriber_show',compact('all_subscribers'));
    }
    public function showConfirmed()
    {
        $all_subscriberConfirmed = Subscriber::where('status',1)->get();
        return view('admin.subscriberConfirmed_show',compact('all_subscriberConfirmed'));
    }


    public function send_email()
    {
        return view('admin.subscriber_send_email');
    }

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Send email
        $subject = $request->subject;
        $message = $request->message;

        $all_subscribers = Subscriber::where('status',1)->get();
        foreach($all_subscribers as $item)
        {
            \Mail::to($item->email)->send(new Websitemail($subject,$message));
        }

        return redirect()->back()->with('success', 'Письмо успешно отправлено.');

    }
    public function update(Request $request)
    {
        $subscriber = Subscriber::find($request->id);
        $subscriber->status = true;
        $subscriber->update();
        return redirect()->back()->with('message', 'Подписчик подтвержден');
    }
    public function updateConfirmed(Request $request)
    {
        $subscriber = Subscriber::find($request->id);
        $subscriber->status = false;
        $subscriber->update();
        return redirect()->back()->with('message', 'Подписчик подтвержден');
    }
}
