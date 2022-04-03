<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        
        $role = Auth::user()->user_type;

        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }
        
        switch ($role) {
            case 'ADM':
                return redirect()->route('admin.dashboard');
            case 'CHR':
                return redirect()->route('cashier.pos');
            case 'DLVY':
                return redirect()->route('delivery.dashboard');
            default:
                return redirect('/');
        }
                    
    }

}