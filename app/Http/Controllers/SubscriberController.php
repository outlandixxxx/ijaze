<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
  public function subscribe(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:subscribers,email',
    ], [
        'email.unique' => 'You have already subscribed with this email.',
    ]);

    if($validator->fails()){
        return response()->json(['errors' => $validator->errors()]);
    }

    Subscriber::create(['email' => $request->email]);

    return response()->json(['success' => 'You have successfully subscribed!']);
}


}
