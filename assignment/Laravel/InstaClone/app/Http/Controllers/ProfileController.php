<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }
    public function upload(Request $request)
    {
        /*
        //session-12 Task-1
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('uploads/profile'),
                $filename
            );

            return back()->with('success', 'Profile picture uploaded successfully.');
        }

        return back()->with('error', 'Please select a profile picture.');
    */
    //session-12 Task-2
    /*
     $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'profile_picture.required' => 'Please select a profile picture.',
            'profile_picture.image' => 'The file must be an image.',
            'profile_picture.mimes' => 'Only JPEG and PNG images are allowed.',
            'profile_picture.max' => 'The profile picture must be less than 2MB.',
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);
        }

        return back()->with('success', 'Profile picture uploaded successfully.');
    */
    //session-12 Task-3
    /*
    $request->validate([
        'profile_picture' => 'required|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    $path = $request->file('profile_picture')
                    ->store('profile_pics', 'public');

    $user = Auth::user();

    $user->profile_picture = $path;
    $user->save();

    return back()->with('success', 'Profile picture uploaded successfully.');
     */

    $request->validate([
        'profile_picture' => 'required|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    $user = Auth::user();

    $file = $request->file('profile_picture');

    $filename = $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();

    $path = $file->storeAs('profile_pics', $filename, 'public');

    $user->profile_picture = $path;

    $user->save();

     return back()->with('success', 'Profile picture uploaded successfully.');
    }
}