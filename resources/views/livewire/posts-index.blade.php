<div>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select wire:model="category" name="category" id="category" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="Toate categoriile">Toate categoriile</option>
                @foreach($categories as $category)
                    <option>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Cauta o postare" class="placeholder-gray-900 w-full rounded-xl bg-white  border-none px-4 py-2 pl-8">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- end of filters -->

    <div class="ideas-container space-y-6 my-6">
        @foreach($posts as $post)
            <div
                x-data
                @click="const target = $event.target.tagName.toLowerCase()
                const ignores = ['button', 'svg', 'path', 'a']
                if(!ignores.includes(target)){
                     $event.target.closest('.idea-container').querySelector('.idea-link').click()
                }"
                class="idea-container bg-white rounded-xl flex hover:shadow-card transition cursor-pointer duration-150 ease-in">
                <div class="flex flex-1 px-2 py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="{{$post->user->getAvatar()}}" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full flex flex-col justify-between mx-4 ">
                        <h4 class="text-xl font-semibold">
                            <a href="{{route('post.show', $post)}}" class="idea-link hover:underline">{{$post->title}}</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{$post->description}}
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xxs text-gray-400 font-semibold space-x-2">
                                <div>{{$post->created_at->diffForHumans()}}</div>
                                <div>&bull;</div>
                                <div>{{$post->category->name}}</div>
                                <div>&bull;</div>
                                <div class="text-gray-900"> 3 Comments</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ideas-container -->
</div>
