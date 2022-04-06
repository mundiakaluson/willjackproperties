<div class="bg-gray-300">
  
  <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">

    <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      @foreach ($properties as $property)
      @php
        
        $photos = DB::table('photos')->select('photo_paths')->where('id', $property->id)->get();
        $photos_array = json_decode($photos);

        foreach ($photos_array as $photo_instance) {
            foreach ($photo_instance as $photos) {
                $url_format = substr($photos, 1, -1);
                $str_clean = str_replace(['"', "\\"], "", $url_format);
                $str_clean = explode(',', $str_clean);
            }
        }
      @endphp
      <a href="{{ route('properties.properties.details', ['id' => $property->id]) }}" class="group">
        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
          <img src="{{ url('storage/' . $str_clean[0]) }}" style="height: 30px"
            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
            class="w-full h-1/2 object-center object-cover group-hover:opacity-75">
        </div>
        <h3 class="mt-4 text-sm text-gray-700">
          {{ $property->name }}
        </h3>
        <p class="mt-1 text-sm font-medium text-gray-900">
          {{ $property->location }}
        </p>
        <p class="mt-1 text-lg font-medium text-gray-900">
          KES {{ $property->price }} <sup>{{ $property->terms }}</sup>
        </p>
      </a>
      @endforeach

      <!-- More products... -->
    </div>
  </div>
</div>