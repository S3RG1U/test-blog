<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{

    public $post;
    public $title;
    public $category;
    public $description;

    protected $rules = [
        'title'=>'required|min:4',
        'category'=>'required|integer',
        'description'=>'required|min:4'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->category = $post->category_id;
        $this->description = $post->description;
    }

    public function updatePost()
    {
        $this->validate();

        $this->post->update([
            'title'=>$this->title,
            'category_id'=>$this->category,
            'description'=>$this->description,
        ]);

        $this->emit('postWasUpdated');
    }

    public function render()
    {
        return view('livewire.edit-post',[
            'categories'=>Category::all(),
        ]);
    }
}
