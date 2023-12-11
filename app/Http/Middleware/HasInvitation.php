<?php

namespace App\Http\Middleware;

use App\Models\Invitation;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasInvitation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * Only for GET requests. Otherwise, this middleware will block our registration.
         */
        if ($request->isMethod('get')) {
            /**
             * No token = Good bye.
             */
            if (! $request->has('invitation_token')) {
                return redirect(route('home'))
                    ->with('error', 'Oops');
            }

            $invitation_token = $request->get('invitation_token');

            /**
             * Lets try to find invitation by its token.
             * If failed -> return to request page with error.
             */
            try {
                $invitation = Invitation::where('invitation_token', $invitation_token)->firstOrFail();
            } catch (ModelNotFoundException $e) {
                return redirect(route('home'))
                    ->with('error', 'There is something wrong. Please contact our administrator');
            }

            /**
             * Lets check if users already registered.
             * If yes -> redirect to login with error.
             */
            if (! is_null($invitation->registered_at)) {
                return redirect(route('login'))->with('error', 'The invitation link has already been used.');
            }
        }

        return $next($request);
    }
}
