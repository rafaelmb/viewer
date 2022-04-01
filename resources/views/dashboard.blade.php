<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('status'))
                        <div>{{session('status')}}</div>
                    @endif
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{route('url.create')}}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="url" :value="__('Url')" />
                                    <x-input id="url" class="block mt-1 w-full" type="text" name="url" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-3">
                                    {{ __('Save') }}
                                </x-button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
