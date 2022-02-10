<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Landlord: {{ ucfirst($landlord->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('admin.properties.new') }}" class="text-left text-xs font-medium text-gray-700 uppercase tracking-wider bg-gray-300 p-2 rounded-lg hover:bg-gray-200 hover:text-black">New Property</a>
                        <p class="mt-2 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> You're logged in as admin <span class="text-black">{{ Auth::user()->name }}</span>.</p>
                        
                        @include('livewire.owner-details')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>