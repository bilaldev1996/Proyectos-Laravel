<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%'. $this->search. '%')
                ->orWhere('email', 'like', '%'. $this->search. '%')
                ->latest('id')
                ->paginate(10);

                
        return view('livewire.admin.users-index',compact('users'));
    }
}
