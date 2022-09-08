<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Response;
use Livewire\Component;

class CreatePost extends Component
{

    public $title;
    public $category = 1;
    public $description;

    protected $rules = [
        'title'=>'required|min:4',
        'category'=>'required|integer',
        'description'=>'required|min:4'
    ];

    public function createPost()
    {
        if(auth()->check()){
            $this->validate();
            Post::create([
                'user_id'=>auth()->id(),
                'category_id'=>$this->category,
                'title'=>$this->title,
                'description'=>$this->description,
            ]);
            session()->flash('success_message', 'Post was added successfully.');

            $this->reset();

            return redirect()->route('post.index');
        }
        abort(Response::HTTP_FORBIDDEN);

    }


    public function render()
    {
        return view('livewire.create-post',[
            'categories'=>Category::all(),
        ]);
    }
}
