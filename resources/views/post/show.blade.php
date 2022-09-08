<x-app-layout>

    <livewire:edit-post :post="$post"/>

    <livewire:delete-post :post="$post"/>

    <div class="ideas-container space-y-6 my-6">
        <div
            x-data
            @click="const target = $event.target.tagName.toLowerCase()
                const ignores = ['button', 'svg', 'path', 'a']
                if(!ignores.includes(target)){
                     $event.target.closest('.idea-container').querySelector('.idea-link').click()
                }"
            class="idea-container bg-white rounded-xl flex hover:shadow-card transition duration-150 ease-in">
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
                        <div class="flex items-center space-x-2"
                             x-data="{isOpen: false}">
                            <div class="bg-blue text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Comenteaza
                            </div>
                            <button @click="isOpen = !isOpen" class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in">
                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul x-show="isOpen"
                                    x-cloak
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute w-44 text-left ml-8 font-semibold bg-white shadow-dialog rounded-xl py-3">
                                    <li><a href="#"
                                           @click="
                                               isOpen = false
                                               $dispatch('custom-show-edit-modal')"
                                           class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Editeaza postarea</a></li>
                                    <li><a
                                            @click="
                                               isOpen = false
                                               $dispatch('custom-show-delete-modal')"
                                            href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Sterge postarea</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- ideas-container -->
