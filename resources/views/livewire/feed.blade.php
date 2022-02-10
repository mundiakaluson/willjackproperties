<div>
    <a style="cursor: pointer" wire:click='refreshFeeds' class="bg-gray-200 text-gray-500 text-xs p-1 rounded-lg hover:bg-gray-100 hover:bg-text-500" wire:click='refreshFeeds'>
        Refresh
    </a>
    {{-- <p wire:model='showSuccessRefresh' class="text-gray-500 text-xs">Refresh Success!</p> --}}
    @foreach ($feeds as $feed)
        <div wire:poll.750ms class="flex mb-1 rounded justify-between pt-1">
            <span class="rounded-full text-white dark:text-gray-800 h-5 w-5 items-center justify-between">
                <img class="w-5 h-5" src="https://img.icons8.com/ios/50/000000/bot.png" />
            </span>
            <div class="flex items-center w-full justify-between">
                <div class="flex text-sm flex-col w-full ml-2 items-start justify-between">
                    <p class="text-gray-700 dark:text-white">
                        <span class="text-xs"> {{ $feed->log_name }}</span>
                    <div>
                        <span class="text-xs"> {{ $feed->causer->name }} </span>
                    </div>
                    <span class="text-xs"> {{ $feed->description }} </span>
                    </p>
                    <p class="text-gray-500 text-xs">
                        {{ Carbon\Carbon::parse($feed->created_at)->timezone('Africa/Nairobi')->diffForHumans() }}
                    </p>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>