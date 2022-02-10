<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-gray-100 rounded-lg">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
      <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-2xl">
        <span class="block">{{ $greetings }} {{ ucfirst(auth()->user()->name) }}!</span>
        <span class="block text-black text-sm">{{ $quote }}</span>
        <span class="block text-gray-400 text-sm">Here's whats happening today.</span>
      </h2>
      <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
        <div class="inline-flex rounded-md shadow">
          <a class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
            <div wire:poll.750ms>
                Current time: {{ \Carbon\Carbon::now()->timezone('Africa/Nairobi')->format('D d, H:i:s') }}
            </div>
          </a>
        </div>
        <div class="ml-3 inline-flex rounded-md shadow">
          <a style="cursor: pointer" wire:click='inspire()' class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-600 bg-white hover:bg-gray-50">
            Insipire Me
          </a>
        </div>
      </div>
    </div>
  </div>
  