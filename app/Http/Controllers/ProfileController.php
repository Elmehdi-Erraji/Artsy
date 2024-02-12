<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return view('profile.profile', [
            'user' => $request->user(),
        ]);
    }

    public function show(string $id)
    {
        //
    }


    public function update(Request $request , string $id): RedirectResponse
    {

        $user = User::findOrFail($id);



        if ($request->hasFile('profileImage')) {
            $media = $user->addMedia($request->file('profileImage'))->toMediaCollection('avatars');

            if ($user->getFirstMediaUrl('profile')) {
                $user->clearMediaCollection('profile');
            }
        }
        $user->update($request->all());

        if ($request->hasFile('avatar')) {
            if ($user->getFirstMediaUrl('avatars')) {
            $user->clearMediaCollection('avatars');
        }
            $user->addMediaFromRequest('avatar')->usingName($user->name)->toMediaCollection('avatars');


        }
        return Redirect::route('users.index')->with('success', 'Profile updated successfully.');
    }


    /**
     * Delete the user's account.
     */
//    public function destroy(Request $request): RedirectResponse
//    {
//        $request->validateWithBag('userDeletion', [
//            'password' => ['required', 'current_password'],
//        ]);
//
//        $user = $request->user();
//
//        Auth::logout();
//
//        $user->delete();
//
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
//
//        return Redirect::to('/');
//    }
}
