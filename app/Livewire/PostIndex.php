<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $posts = Post::where('titulo', 'like', '%' . $this->search . '%')
                     ->paginate(10);

        return view('livewire.post-index', compact('posts'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        $this->resetPage();
    }
}


