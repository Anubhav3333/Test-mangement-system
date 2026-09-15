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


        return redirect('./')->with('success', 'Your message has been sent successfully!');
    }

    public function doubt(Request $request)
{
    $query = Contacts::query();

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%')
              ->orWhere('subject', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $queries = $query->latest()->get();

    return view('teacher.doubt', compact('queries'));
}


}
