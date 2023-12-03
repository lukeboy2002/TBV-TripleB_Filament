<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Mail\InvitationMail;
use App\Models\Invitation;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Mail;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('inviteUser')
                ->form([
                    TextInput::make('email')
                        ->email()
                        ->required()
                ])
                ->action(function ($data) {

                    $userExists = User::where('email', $data['email'])->exists();

                    if ($userExists) {
                        Notification::make('userExists')
                            ->body('User with this email already exists!')
                            ->danger()->send();

                        return;
                    }

                    $invitation = Invitation::create([
                        'email' => $data['email'],
                        'invited_by' => current_user()->name,
                        'invited_date' => NOW(),
                    ]);

                    // @todo Add email sending here
                    Mail::to($invitation->email)->send(new InvitationMail($invitation));

                    Notification::make('invitedSuccess')
                        ->body('User invited successfully!')
                        ->success()->send();
                }),
        ];
    }
}
