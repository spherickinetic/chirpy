<x-app-layout>
    <div class="flex">

    <x-navigation></x-navigation>

    <div class="basis-1/2 max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @auth
        <form method="POST" action="{{ route('chirps.store') }}" enctype="multipart/form-data">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <label>
                <input type="file" class="form-control" name="image" />
                <i class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4">Add Image</i>
            </label>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Chirp') }}</x-primary-button>
        </form>
        @endauth
 
            @foreach ($chirps as $chirp)
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <div class="p-6 flex space-x-2">
                    <img class="h-16" src="{{ $chirp->user->avatar_url }}" />
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $chirp->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($chirp->created_at->eq($chirp->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($chirp->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('chirps.edit', $chirp)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif


                            @auth
                            @if (!$chirp->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        @if($chirp->user->followers->contains(auth()->user()))
                                            <form method="POST" action="{{ route('followers.destroy') }}">
                                                @csrf
                                                @method('post')
                                                <input type="hidden" id="follower_id" name="follower_id" value="{{ $chirp->user->id }}">
                                                <x-dropdown-link :href="route('followers.destroy')" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Unfollow') }}
                                                </x-dropdown-link>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('followers.store') }}">
                                                @csrf
                                                @method('post')
                                                <input type="hidden" id="follower_id" name="follower_id" value="{{ $chirp->user->id }}">
                                                <x-dropdown-link :href="route('followers.store')" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Follow') }}
                                                </x-dropdown-link>
                                            </form>
                                        @endif
                                    </x-slot>
                                </x-dropdown>
                            @endif
                            @endauth



                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                        @if($chirp->image)
                            <img src="images/{{$chirp->image->url}}" alt="image">
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="basis-1/4 self-start sticky top-0 max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            Most Active Users
            @foreach ($popular_users as $user)
                <div class="flex">
                    <img class="h-8" src="{{ $user->avatar_url }}" />
                    <span>{{ $user->name }}</span>
                    <span>   - {{ $user->chirps_count }}</span>
                </div>
            @endforeach 
        </div>
    </div>
</div>
</x-app-layout>