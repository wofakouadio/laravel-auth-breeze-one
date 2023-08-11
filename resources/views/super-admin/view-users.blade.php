<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
                    @foreach($ListUsers as $user)
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{$user->user_name}} -> {{$user->user_mail}} -> {{$user->role}}</h2>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
