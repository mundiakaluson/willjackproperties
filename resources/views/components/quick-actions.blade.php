<section class="text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto">
        <div class="flex flex-col text-center w-full mb-3">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-1 text-gray-900">Quick Actions</h1>
        </div>
        <div class="flex flex-wrap -m-4 text-center">
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <a href="{{ route('admin.properties.new') }}">
                    <div class="border-2 bg-gray-200 border-black px-4 py-6 rounded-lg hover:bg-gray-50">
                        <img class="text-gray-500 w-12 h-12 mb-3 inline-block"
                            src="https://img.icons8.com/ios/50/000000/add--v1.png" />
                        <p class="leading-relaxed">New Property</p>
                    </div>
                </a>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <a href="{{ route('admin.properties.index') }}">
                    <div class="border-2 bg-gray-200 border-black px-4 py-6 rounded-lg hover:bg-gray-50">
                        <img class="text-gray-500 w-12 h-12 mb-3 inline-block"
                            src="https://img.icons8.com/ios/50/000000/show-all-views.png" />
                        <p class="leading-relaxed">All Properties</p>
                    </div>
                </a>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <a href="">
                    <div class="border-2 bg-gray-200 border-black px-4 py-6 rounded-lg hover:bg-gray-50">
                        <img class="text-gray-500 w-12 h-12 mb-3 inline-block"
                            src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/60/000000/external-invoice-ecommerce-vitaliy-gorbachev-lineal-vitaly-gorbachev.png" />
                        <p class="leading-relaxed">Create Invoice</p>
                    </div>
                </a>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <a href="">
                    <div class="border-2 bg-gray-200 border-black px-4 py-6 rounded-lg hover:bg-gray-50">
                        <img class="text-gray-500 w-12 h-12 mb-3 inline-block"
                            src="https://img.icons8.com/ios/50/000000/property.png" />
                        <p class="leading-relaxed">All Landlords</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>