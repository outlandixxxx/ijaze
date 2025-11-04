<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ReCaptcha;

class ContactController extends Controller
{
        public function submit(Request $request)
    {
        // Create a validator instance
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
            'recaptcha_token' => ['required', new ReCaptcha], // Add reCAPTCHA validation

        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        // Save to database
        Contact::create([
            'email' => $request->email,
            'name' => $request->name,
            'subject' => $request->subject,
            'content' => $request->message, // <- changed here
        ]);

        // Return success message
        return response()->json([
            'status' => 'success',
            'message' => 'تم إرسال الرسالة بنجاح!',
        ]);
    }


    public function newCount()
{
    // Count messages created in the last 5 minutes as "new"
    $count = \App\Models\Contact::where('created_at', '>=', now()->subMinutes(5))->count();

    return response()->json(['count' => $count]);
}


public function index()
{
    $contacts = Contact::orderBy('created_at', 'desc')->paginate(10); // 10 messages per page
    return view('admin.contact', compact('contacts'));
}



public function markAsRead(Contact $contact)
{
    $contact->update(['is_read' => true]);
    return response()->json(['success' => true]);
}



    }

