<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class SuperAdmin extends Component
{
    public function render()
    {
        $this->userList = User::orderBy('users.created_at','DESC')
        ->where('role', 'super admin')
        ->get();
        // dd($this->userList);
        return view('livewire.super-admin');
    }
    
    public $userList;    
    public $kondisi;    
    
    public function loadMore()
    {
        // $this->page=10 + $this->page;
    }

    
    public $nama;    
    public $email;    
    public $id_user;    
    
    public function detail($id) {
        
        $this->resetValidation();
        $this->kondisi='Edit';
        $data=User::where('id_user',$id)->first();
// dd($data);
        $this->nama = $data->name??'';
        $this->email = $data->email??'';
        $this->id_user = $id??'';
    }
    
    public function tambah() {
        
        $this->kondisi='Tambah';
            
        $this->nama = '';
        $this->email = '';
        $this->id_user = '';
        
        $this->resetValidation();
    }

    public function save($id) {
        $validated = $this->validate([
            'nama' => 'required|string|min:3',
            'email' => 'required|string|email',
        ]);

        $validated['id_user'] = Str::uuid();

        if ($id) {
            User::where('id_user',$id)
            ->update([
                'name'=>$this->nama,
                'email'=>$this->email,
            ]);
        }else {
            User::create([
                'id_user'=>Str::uuid(),
                'name'=>$this->nama,
                'email'=>$this->email,
                'password'=>'password',
                'role'=>'super admin',
            ]);
        }

        $this->reset();
    }
}
