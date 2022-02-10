<section class="text-gray-600 body-font">
  <div class="container px-5 py-8 mx-auto">
    <div class="flex flex-col text-center w-full mb-3">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-1 text-gray-900">Current Willjack Properties Statistics</h1>
    </div>
    <div class="flex flex-wrap -m-4 text-center">
      <div class="p-4 md:w-1/4 sm:w-1/2">
        <div class="border-2 bg-gray-300 border-gray-400 px-4 py-6 rounded-lg">
          <img class="text-gray-500 w-12 h-12 mb-3 inline-block" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-house-finance-kiranshastry-lineal-kiranshastry.png"/>
          <h2 class="title-font font-medium text-3xl text-gray-900">{{ $all_properties_count }}</h2>
          <p class="leading-relaxed">Properties Registered</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2">
        <div class="border-2 bg-gray-300 border-gray-400 px-4 py-6 rounded-lg">
          <img class="text-gray-500 w-12 h-12 mb-3 inline-block" src="https://img.icons8.com/ios/50/000000/landlord.png"/>
          <h2 class="title-font font-medium text-3xl text-gray-900">{{ $all_landlords }}</h2>
          <p class="leading-relaxed">Landlords Registered</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2">
        <div class="border-2 bg-gray-300 border-gray-400 px-4 py-6 rounded-lg">
            <img class="text-gray-500 w-12 h-12 mb-3 inline-block" src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/60/000000/external-house-coronavirus-vitaliy-gorbachev-fill-vitaly-gorbachev.png"/>
          <h2 class="title-font font-medium text-3xl text-gray-900">{{ $all_units_occupied }}</h2>
          <p class="leading-relaxed">All Units Occupied</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2">
        <div class="border-2 bg-gray-300 border-gray-400 px-4 py-6 rounded-lg">
            <img class="text-gray-500 w-12 h-12 mb-3 inline-block" src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/60/000000/external-house-coronavirus-vitaliy-gorbachev-lineal-vitaly-gorbachev.png"/>
          <h2 class="title-font font-medium text-3xl text-gray-900">{{ $all_units_available }}</h2>
          <p class="leading-relaxed">All Units Available</p>
        </div>
      </div>
    </div>
  </div>
</section>