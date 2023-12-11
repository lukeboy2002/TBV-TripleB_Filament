<?php

namespace App\Filament;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse as Response;
use Illuminate\Http\RedirectResponse;

class MyLogoutResponse implements Response
{
    public function toResponse($request): RedirectResponse
    {
        return redirect()->to(
            route('home'), // put the name of your home route here
        );
    }
}
