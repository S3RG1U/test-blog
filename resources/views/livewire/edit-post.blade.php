<div
    x-data="{ isOpen: false }"
    x-show="isOpen"
    x-cloak
    @keydown.escape.window="isOpen = false"
    @custom-show-edit-modal.window="isOpen = true"
    x-init="window.livewire.on('postWasUpdated',() => { isOpen = false })"
    class=" relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div
        x-show.transition.opacity="isOpen"
        class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

            <div
                x-show.transition.origin.bottom.duration.400ms="isOpen"
                class="modal relative transform overflow-hidden rounded-tl-xl rounded-tr-xl bg-white transition-all sm:max-w-lg py-4">
               <div class="absolute top-0 right-0 pt-4 pr-4">
                   <button
                       class="text-gray-400 hover:text-gray-500"
                       @click="isOpen = false">
                       <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                       </svg>
                   </button>
               </div>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-center text-lg font-medium text-gray-900">Editeaza postarea</h3>
                        <p class="text-xs text-center text-gray-500">Ai sansa sa iti schimbi gandul</p>
                    <form wire:submit.prevent="updatePost" action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <input wire:model.defer="title" type="text" required class="w-full text-sm border-none bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Titlul postarii">
                            @error('title')
                            <p class="text-red text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <select wire:model.defer="category" name="category_add" id="other_filters" required class="w-full text-sm bg-gray-100 rounded-xl px-4 py-2 border-none">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category')
                        <p class="text-red text-xs mt-1">{{$message}}</p>
                        @enderror
                        <div>
                            <textarea wire:model.defer="description" name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl placeholder-gray-900 text-sm border-none px-4 py-2" placeholder="Descrie postarea mai amanuntit"></textarea>
                            @error('description')
                            <p class="text-red text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between space-x-3">
                            <button type="button" class="flex item-center justify-center w-1/2 h-11 text-xs bg-gray-100 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 ">
                                <svg class="text-gray-600 w-4 -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                            <button type="submit" class="flex item-center justify-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue-200 hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 ">
                                <span class="ml-1 text-white">Actualizeaza</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
