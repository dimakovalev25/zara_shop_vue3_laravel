<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderApproveRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function passwordUpdate(PasswordUpdateRequest $request)
    {
        $user = $request->user();

        $passwordData = $request->validated();

        $user->password = Hash::make($passwordData['new_password']);
        $user->save();

        $request->session()->flash('flash_message', 'Your password was successfully updated.');

        return redirect()->route('profile');
    }

    public function approve(OrderApproveRequest $request)
    {
        $data = $request->validated();
        $request->session()->flash('flash_message', 'The order has been sent, our manager will contact you.');
        return view('approve.index');
    }
    public function view(Request $request)
    {
        $user_auth = Auth::user();
        $id = $user_auth->id;
        $user = User::find($id);
        $customer = $user->customer;
//        $customer_address = $customer->customer_address;
        $countries = Country::query()->orderBy('name')->get();
        return view('layouts.profile', compact('user', 'countries', 'customer'));

    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
