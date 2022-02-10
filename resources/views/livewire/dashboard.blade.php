<div>
    <x-guest-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 border-b border-gray-200">
                        @include('components.daily-quote')
                        @include('components.summary-stats')
                        @include('components.admins-feed')
                        @include('components.quick-actions')
                        @include('components.site-data')
                    </div>
                </div>
            </div>
        </div>
    </x-guest-layout>    
</div>
