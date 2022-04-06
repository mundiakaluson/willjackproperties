<label for="about" class="block text-sm font-medium text-gray-700">Property Photos</label>
<div x-data="{ isUploading: false, progress: 0 }"
     x-on:livewire-upload-start="isUploading = true"
     x-on:livewire-upload-finish="isUploading = false"
     x-on:livewire-upload-error="isUploading = false"
     x-on:livewire-upload-progress="progress = $event.detail.progress">
    <div class="flex items-center justify-center bg-grey-lighter mb-10">

        <label
            class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-gray-300 hover:text-white">
            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
            </svg>
            <span class="mt-2 text-base leading-normal">Select a file</span>
            <input type='file' class="hidden" multiple wire:model='photos' />
        </label>

    </div>
    <div x-show="isUploading" class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
        <div class="bg-gray-600 h-2.5 rounded-full" x-bind:style="`width:${progress}%`"></div>
    </div>
</div>


<div class="grid grid-cols-4 gap-1 content-start">
    @if ($photos)
    @foreach ($photos as $photo)
    <li class="block pt-1 pb-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/2 xl:w-1/8 h-24 ">
        <article tabindex="0"
            class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
            <img alt="upload preview" src="{{ $photo->temporaryUrl() }}"
                class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

            <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                <h1 class="flex-1"></h1>
                <div class="flex">

                    <p class="p-1 size text-xs"></p>
                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path class="pointer-events-none"
                                d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                        </svg>
                    </button>
                </div>
            </section>
        </article>
    </li>
    @endforeach
    @endif

</div>