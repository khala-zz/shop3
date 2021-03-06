<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Newsletters;
use Mail;

class ContactController extends Controller {

    // Create Contact Form
    public function createForm(Request $request) {
      return view('frontend.contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:10',
            'message' => 'required'
         ]);

        //  Store data in database
        Contact::create($request->all());

        //  Send mail to admin
        \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('dokhaclam@gmail.com', 'Admin')->subject($request->get('name'));
        });

        return back()->with('flash_message_success', 'Chúng tôi đã nhận được thông tin của bạn,chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất,cám ơn.');
    }

    // Store Newsletter
    public function storeNewsletter(Request $request) {
        //dd($request -> email);
        // Form validation
        $this->validate($request, [
            
            'email' => 'required|email',
            
         ]);

        //  Store data in database
        Newsletters::create($request->all());

        //  Send mail to admin
        \Mail::send('newsletter', array(
            
            'email' => $request->get('email'),
            
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('dokhaclam@gmail.com', 'Admin')->subject('đăng kí nhận khuyên mãi');
        });

        return back()->with('flash_message_success', 'Chúng tôi đã nhận được email đăng kí của bạn,chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất,cám ơn.');
    }

}