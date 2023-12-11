<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Invitation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;

class UserController extends Controller
{
    use PasswordValidationRules;
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $invitation_token = $request->get('invitation_token');
        $invitation = Invitation::where('invitation_token', $invitation_token)->firstOrFail();
        $email = $invitation->email;

        return view('profile.create', compact('email', 'invitation'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
                'string',
                'alpha_dash',
                'max:255',
                'unique:users',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'invited_by' => $request['invited_by'],
            'email_verified_at' => now(),
            'password' => Hash::make($request['password']),
        ]);

        //generate image
        $name = get_initials($user->name);
        $id = $user->id.'.png';
        $path = '/profile-photos/';
        $imagePath = create_avatar($name, $id, $path);

        //save image
        $user->profile_photo_path = $imagePath;
        $user->save();

        $role = Role::select('id')->where('name', 'user')->first();

        $user->roles()->attach($role);

        $invitation = Invitation::where('email', $user->email)->firstOrFail();
        $invitation->delete();

        $request->session()->flash('success', 'Account successfully created. You can login.');
        return redirect()->route('home');
    }
}
