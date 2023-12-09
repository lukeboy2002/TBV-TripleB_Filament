<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserInvitation;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function create()
    {
        return view('invitations.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:invitations'],
        ]);

        $invitation = Invitation::create([
            'email' => $request['email'],
            'invited_by' => current_user()->username,
            'invited_date' => now()
        ]);

        $invitation->generateInvitationToken();
        $invitation->save();

        $mailData = [
            'title' => 'U have a invitation from TripleB',
            'link' => $invitation->getLink(),
            'invited_by' => current_user()->username,
            'invited_date' => now()
        ];

        Mail::to($request->get('email'))->send(new UserInvitation($mailData));

        $request->session()->flash('success', 'Invitation to register successfully requested. A mail is been send to '.$invitation->email);

        return redirect()->route('admin.invitations.create');
    }
}
