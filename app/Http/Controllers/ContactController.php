<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // $request->validate([
        //     'subject' => 'required|string|max:255',
        //     'message' => 'required|string',
        // ]);

        //dd($request->all());
        //dd(auth()->id()); // See if the user is logged in and get their ID

        $user_id = auth()->id();
        Contact::create([
            'name'    => Auth::user()->name,
            'email'   => Auth::user()->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'user_id' =>$user_id,
        ]);
        
        //return back()->with('success', 'Message sent successfully!');
        return redirect()->route('contact')->with('status', 'Your message has been sent successfully!');
}
public function allFeedbacks()
{
    $feedbacks = \App\Models\Contact::orderBy('created_at', 'desc')->get();
    return view('all', compact('feedbacks'));
}


public function index()
{
    $feedbacks = Contact::latest()->take(3)->get();
    return view('index', compact('feedbacks'));
}

}

