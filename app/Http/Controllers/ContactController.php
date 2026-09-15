<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Models\contacts;

class ContactController extends Controller
{
    public function index()
    {

        return view('contact');
    }

    public function store(Request $request)
    {
        $form =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
       
        Contacts::create($form);


        return back()->with('success', 'Your message has been sent successfully!');
    }

   public function doubt()
{
    $queries = contacts::latest()->get();

    return view('teacher.doubt', compact('queries'));
}
}
