<x-app-layout>

<div class="flex">
<x-navigation></x-navigation>
<div class="basis-1/2 max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
    </div>
    <div class="basis-1/4 self-start sticky top-0 max-w-2xl mx-auto p-4 sm:p-6 lg:p-8"></div>
</div>
</x-app-layout>
