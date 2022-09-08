<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class PostsIndex extends Component
{

    public $category;

    protected $queryString = [
        'category'
    ];

    public function render()
    {
        $categories = Category::all();

        return view('livewire.posts-index',
            [
                'posts'=>Post::all()
                ->when($this->category && $this->category !== 'Toate categoriile', function($query) use
                ($categories){
                    return $query->where('category_id', $categories->pluck('id','name')->get($this->category));
                }),
                'categories' => $categories,
            ]);
    }
}
