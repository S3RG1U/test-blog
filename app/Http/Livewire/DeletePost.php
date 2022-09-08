<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class DeletePost extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function  deletePost()
    {
        Post::destroy($this->post->id);

        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.delete-post');
    }
}
