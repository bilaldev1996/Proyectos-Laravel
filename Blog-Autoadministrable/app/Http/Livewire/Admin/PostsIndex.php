<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $status = '';
    
    

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id) 
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->where('status', 'LIKE', '%' . $this->status . '%')
                ->latest('id')
                ->paginate(14);
        return view('livewire.admin.posts-index', compact('posts'));
    }

    
}
