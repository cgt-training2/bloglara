<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use Session;

use App\Post;

class PagesController extends Controller
{
    public function getIndex(){

    	$posts=Post::orderBy('created_at','desc')->limit(4)->get();
    	return view('pages.welcome')->withPosts($posts);

    	// $first="Vaibhav";
    	// $last="Sharma";
    	// $fullname=$first." ".$last;
    	// return view('pages.welcome')->withFullname($fullname);
    	// return view('welcome')->with('fullname',$fullname);
    	// return view('welcome')->withFullname($fullname);

	}


    public function getAbout() {
        $first = 'Vaibhav';
        $last = 'Sharma';

        $fullname = $first . " " . $last;
        $email = 'vaibhav@sharma.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withData($data);
    }

   	public function getContact(){
		return view('pages.contacts');

	}

    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
            );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('vaibhsa@sharma.in');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was Sent!');

        return redirect('/');
    }
}
