<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\Http\Request;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }


    public function login(Request $request)
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $login = Auth::attempt($credentials);
        
        if ($login) {
            // dd(Auth::user());
            // $request->session()->regenerate();
            return redirect()->to('/dashboard');
        } else {
            session()->flash('error', 'Login gagal. Silakan coba lagi.');
        }
    }
}
