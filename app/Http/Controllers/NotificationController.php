<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index()
    {
        return Notification::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
        ]);

        $newM = Notification::create($request->all());

        return response(['data' => $newM, 'message'=>'save register' ],201);
    }

    public function update(Request $request, Notification $notification)
    {
        $notification->update($request->all());
        return response(['message'=>'update register'],201);
    }

    public function destroy(Notification $notification, $id)
    {

        $noty = Notification::findOrFail($id);

        $noty->delete();
        return response(['message'=>'delete register'],200);

    }
}
