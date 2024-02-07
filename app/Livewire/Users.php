<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{

    public $adminList;
    public $userList;
    public $adminSearch=null;
    public $userSearch;
    public function mount()
    {
        $this->loadMore();
    }

    public function render()
    {

        $this->adminList = User::orderBy('users.created_at','DESC')
        ->where('role', 'admin')
        ->get();
        $this->userList = User::orderBy('users.created_at','DESC')
        ->where('role', 'user')
        ->get();

        return view('livewire.users');
    }

    
    
    public function loadMore()
    {
        // $this->page=10 + $this->page;
    }
    
}
