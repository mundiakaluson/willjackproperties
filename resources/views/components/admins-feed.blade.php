<div class="grid grid-cols-1 md:grid-cols-5 items-start px-4 xl:p-0 gap-y-4 md:gap-6">
    <div class="col-start-1 col-end-5">
        <h2 class="text-xs md:text-sm text-gray-800 font-bold tracking-wide">Activity Feed</h2>
    </div>
    <div class="col-span-2 bg-white p-3 rounded-xl border border-gray-50 flex flex-col space-y-6">
          <livewire:feed />
    </div>
    <div class="col-span-3 bg-white p-6 rounded-xl border border-gray-50 flex flex-col space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-sm text-gray-600 font-bold tracking-wide">Latest Properties</h2>
            <a href="#"
                class="px-4 py-2 text-xs bg-blue-100 text-blue-500 rounded uppercase tracking-wider font-semibold hover:bg-blue-300">More</a>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="bg-white border-b">
                      <tr>
                        <th scope="col" class="text-xs text-gray-900 px-6 py-4 text-left">Time</th>
                        <th scope="col" class="text-xs text-gray-900 px-6 py-4 text-left">P. ID</th>
                        <th scope="col" class="text-xs text-gray-900 px-6 py-4 text-left">Owner ID</th>
                        <th scope="col" class="text-xs text-gray-900 px-6 py-4 text-left">Type</th>
                        <th scope="col" class="text-xs text-gray-900 px-6 py-4 text-left">Price</th>
                        <th scope="col" class="text-xs text-gray-900 px-6 py-4 text-left">T. Units</th>
                        <th scope="col" class="text-xs text-gray-900 px-6 py-4 text-left">A. Units</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($latest_properties as $latest_property)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                          <td class="px-6 py-2 whitespace-nowrap text-xs text-gray-900">{{ Carbon\Carbon::parse($latest_property->created_at)->diffForHumans() }}</td>
                          <td class="text-xs text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $latest_property->id }}</td>
                          <td class="text-xs text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $latest_property->owner_id }}</td>
                          <td class="text-xs text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $latest_property->type }}:{{ $latest_property->status }}</td>
                          <td class="text-xs text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $latest_property->price }}</td>
                          <td class="text-xs text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $latest_property->total_units }}</td>
                          <td class="text-xs text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $latest_property->available_units }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
<!-- End Third Row -->
</div>