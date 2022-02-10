<div class="flex flex-row h-screen bg-gray-100 rounded-lg">

    <div class="flex flex-row flex-auto bg-white rounded-tl-xl border-l shadow-xl">
        <div class="flex flex-col w-1/5">

            <div class="flex-auto overflow-y-auto">
                <p class="block border-b">
                <div class="border-l-2 border-transparent p-3 mb-4 space-y-2">
                    <div class="flex flex-row items-center space-x-2">
                        <strong class="flex-grow text-lg">Start a Conversation</strong>
                    </div>

                    <div class="flex flex-row items-center space-x-1">
                        <div class="flex-grow text-xs">Choose from the list of admins to start a conversation with.
                        </div>
                    </div>
                </div>
                </p>
                <hr>
                @foreach ($available_admins as $available_admin)
                <a class="block border-b"
                    href="{{ route('inbox.chat.messages', ['sender_id' => auth()->user()->id, 'receiver_id' => $available_admin->id]) }}">
                    <div class="border-l-2 border-transparent hover:bg-gray-100 p-3 space-y-4">
                        <div class="flex flex-row items-center space-x-2">
                            <strong class="flex-grow text-xs">Admin: {{ $available_admin->name }}</strong>
                            <div class="text-sm text-gray-600">5hr</div>
                        </div>

                        <div class="flex flex-row items-center space-x-1">
                            <div class="flex-grow truncate text-xs">some message content whedkjwhed wkjehdkjweh
                                dkjhwekjdhwekjhd </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <div class="w-3/5 border-l border-r border-gray-400 flex flex-col">
            <div class="flex-none h-20 flex flex-row justify-between items-center p-5 border-b">
                <div class="flex flex-col space-y-1">
                    <strong>Nikola Tesla</strong>
                    <input type="text" placeholder="Add coversation title"
                        class="text-sm outline-none border-b border-dashed text-black placeholder-gray-600" />
                </div>
            </div>

            <div wire:poll.750ms class="flex-auto overflow-y-auto p-5 space-y-4">
                {{-- @if ($message_instance->sender_id == auth()->user()->id)
                            {{ auth()->user()->name }}
                        @elseif ($message_instance->receiver_id != auth()->user()->id)
                        @php
                            $receiver = DB::table('users')->where('id', $message_instance->receiver_id)->get()[0];
                        @endphp
                            {{ $receiver->name }}
                        @endif --}}
                @foreach ($get_messages as $message_instance)
                @if ($message_instance->sender_id == auth()->user()->id)
                <div class="flex flex-row space-x-2">
                    <div class="flex flex-col">
                        @php
                            $sender = DB::table('users')->where('id', $message_instance->sender_id)->get()[0]->name;
                        @endphp
                            {{ $sender }}
                        <div class="bg-gray-200 rounded p-2">
                            {{ $message_instance->message }}
                        </div>
                        <div class="text-sm text-gray-600">4hr ago</div>
                    </div>
                </div>
                @else
                {{-- <div class="flex flex-row justify-center text-sm text-gray-600">
                    You assigned this conversation to yourself 5d ago
                </div> --}}
                <div class="flex flex-row space-x-2 flex-row-reverse space-x-reverse">
                    <div class="flex flex-col">
                        @php
                            $receiver = DB::table('users')->where('id', $message_instance->receiver_id)->get()[0]->name;
                        @endphp
                            {{ $receiver }}
                        <div class="bg-blue-100 rounded p-2">
                            {{ $message_instance->message }}
                        </div>
                        <div class="text-sm text-gray-600">5h ago</div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="flex-none h-20 p-4 pt-0">
                <form wire:submit.prevent='sendMessage'>
                    @csrf
                    <input type="hidden" wire:model='sender_id'>
                    <input type="hidden" wire:model='receiver_id'>
                    <div class="flex items-center border-b border-teal-500 py-2">
                        <input wire:model='message' wire:model='message'
                            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            type="text" placeholder="Type your message..." aria-label="Full name">
                        <a href="javascript:void(0);" wire:click="sendMessage()" type="button" wire:keydown.enter.prevent='sendMessage()'
                            class="flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-teal-500 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded"
                            type="button">
                            Send
                        </a>
                        <a href="javascript:void(0);" wire:click='clear()' class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded"
                            type="button">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>