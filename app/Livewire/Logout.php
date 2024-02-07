<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        // Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
        
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.logout');
    }
}