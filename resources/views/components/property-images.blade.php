<div class="bg-gray-50 container flex flex-wrap mx-auto">
    @if (is_array($photos ?? '') || is_object($photos ?? ''))
        @foreach ($photos ?? '' as $photo)
            <div class="w-full p-2 rounded-lg lg:w-1/4 w-1/4">
                <img src="{{ url('storage/' . $photo) }}"
                    alt="{{ url('storage/' . $photo) }}">
            </div>
        @endforeach
    @endif
    
</div>