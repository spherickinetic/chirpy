<div class="basis-1/4 self-start sticky top-0 max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    @auth
    <div class="flex flex-col">
        <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 124 124">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M95.799,87.061c-1.96-1.857-3.291-4.046-3.963-6.514c1.101-2.402,1.658-4.952,1.658-7.593V57.771 c0-6.521-3.432-12.239-8.572-15.493v-9.857c0-14.083-11.457-25.54-25.54-25.54H31.524c-14.083,0-25.539,11.457-25.539,25.54v21.849 c0,3.778,0.819,7.423,2.436,10.846c-0.979,3.837-3.005,7.229-6.028,10.092L0,77.475l3.114,1.076c2.032,0.703,4.191,1.06,6.417,1.06 c3.412,0,6.997-0.823,10.667-2.448c3.505,1.734,7.4,2.646,11.327,2.646h7.265c2.722,6.729,9.297,11.502,16.993,11.502h19.355 c2.727,0,5.432-0.612,7.884-1.777c2.54,1.089,5.025,1.641,7.402,1.641c1.613,0,3.18-0.259,4.654-0.769l3.114-1.077L95.799,87.061z M21.209,73.179l-0.897-0.49l-0.923,0.44c-4.185,1.996-8.173,2.8-11.817,2.362c2.433-3.004,4.081-6.416,4.913-10.181l0.154-0.698 l-0.323-0.638c-1.546-3.05-2.331-6.314-2.331-9.706V32.421c0-11.877,9.663-21.54,21.539-21.54h27.858 c11.877,0,21.54,9.663,21.54,21.54v21.848c0,11.876-9.663,21.538-21.54,21.538H31.524C27.924,75.806,24.357,74.898,21.209,73.179z M90.423,87.172c-2.06,0-4.277-0.561-6.592-1.664l-0.923-0.44l-0.897,0.49c-2.098,1.146-4.475,1.751-6.874,1.751H55.782 c-5.433,0-10.159-3.039-12.594-7.502h16.194c14.083,0,25.54-11.456,25.54-25.538V47.29c2.809,2.62,4.572,6.345,4.572,10.48v15.183 c0,2.258-0.523,4.433-1.555,6.466l-0.324,0.638l0.154,0.699c0.516,2.335,1.468,4.481,2.841,6.413 C90.548,87.17,90.486,87.172,90.423,87.172z"></path>
        </svg>
            {{ __('Chirp') }}
        </x-nav-link>

        <x-nav-link :href="route('profile.edit')">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
            </svg>
            {{ Auth::user()->name }}
        </x-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19 23H11C10.4477 23 10 22.5523 10 22C10 21.4477 10.4477 21 11 21H19C19.5523 21 20 20.5523 20 20V4C20 3.44772 19.5523 3 19 3L11 3C10.4477 3 10 2.55229 10 2C10 1.44772 10.4477 1 11 1L19 1C20.6569 1 22 2.34315 22 4V20C22 21.6569 20.6569 23 19 23Z" fill="#0F0F0F"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.48861 13.3099C1.83712 12.5581 1.83712 11.4419 2.48862 10.6902L6.66532 5.87088C7.87786 4.47179 10.1767 5.32933 10.1767 7.18074L10.1767 9.00001H16.1767C17.2813 9.00001 18.1767 9.89544 18.1767 11V13C18.1767 14.1046 17.2813 15 16.1767 15L10.1767 15V16.8193C10.1767 18.6707 7.87786 19.5282 6.66532 18.1291L2.48861 13.3099ZM4.5676 11.3451C4.24185 11.7209 4.24185 12.2791 4.5676 12.6549L8.1767 16.8193V14.5C8.1767 13.6716 8.84827 13 9.6767 13L16.1767 13V11L9.6767 11C8.84827 11 8.1767 10.3284 8.1767 9.50001L8.1767 7.18074L4.5676 11.3451Z" fill="#0F0F0F"></path>
            </svg>
                {{ __('Log Out') }}
            </x-nav-link>
        </form>

    </div>
    @endauth
    @guest
    
        @if (Route::has('login'))
            <div class="p-6 text-right z-10">
                <a href="{{ route('login') }}" class="font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log me in now</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            </div>
        @endif

    @endguest
</div>