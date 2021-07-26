<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserDataTable extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::paginate(15);
        return view('livewire.user-data-table',compact('users'));
    }
}
