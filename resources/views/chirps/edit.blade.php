<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('chirps.update', $chirp) }}">
            @csrf
            @method('patch')
            <textarea
                name="message"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $chirp->message) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
        @if($chirp->image)
            <img src="../../images/{{$chirp->image->url}}" alt="image">
            <form method="POST" action="{{ route('images.destroy') }}">
            @csrf
            @method('delete')
            <input type="hidden" id="chirp_id" name="chirp_id" value="{{ $chirp->id }}">
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Delete Image') }}</x-primary-button>
            </div>
        </form>
        @endif
    </div>
</x-app-layout>