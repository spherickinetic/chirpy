<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <span class="text-gray-800">People who follow me</span>
    <div class="m-6 bg-white shadow-sm rounded-lg divide-y">
    @forelse ($followers as $follower)
        <div class="p-6 flex space-x-2">
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-gray-800">{{ $follower->name }}</span>
                        

                        
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="p-6 flex space-x-2">
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-gray-800">No one</span>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
    </div>

                                

    <span class="text-gray-800">People I follow</span>
        <div class="m-6 bg-white shadow-sm rounded-lg divide-y">
            

        @forelse ($following as $follower)
            <div class="p-6 flex space-x-2">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $follower->name }}</span>
                        </div>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                    <form method="POST" action="{{ route('followers.destroy') }}">
                                        @csrf
                                        @method('post')
                                        <input type="hidden" id="follower_id" name="follower_id" value="{{ $follower->id }}">
                                        <x-dropdown-link :href="route('followers.destroy')" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Unfollow') }}
                                        </x-dropdown-link>
                                    </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-6 flex space-x-2">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">No one</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
        </div>
    </div>
</x-app-layout>