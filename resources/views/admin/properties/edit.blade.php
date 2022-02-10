<div>
    <div class="content-center justify-center items-center">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg w-9/12 ">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Edit Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Edit property details and click save.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <form wire:submit.prevent='edit'>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Edited By Admin:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <div class="flex rounded-md shadow-sm">
                                <input type="text" wire:model='uploaded_by' name="uploaded_by" id="uploaded_by" value="{{ Auth::id() }}" disabled
                                    class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md text-gray-500 sm:text-sm border-gray-300"
                                    autocomplete="">
                            </div>
                        </dd>
                    </div>
                    <input type="hidden" name="uploaded_by" value="{{ Auth::id() }}" wire:model='uploaded_by'>
                    <dl>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Owner ID: Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select wire:model='owner_id'
                                        class="form-select focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="text-gray-500 text-xs">Set to Current Owner</span>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Property ID
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                                {{ $property->id }} <span class="font-bold text-xs text-red-500">Unchanged</span>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Property Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" wire:model='name' name="name" id="name" value="{{ $property->name }}"
                                        class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                        autocomplete="" placeholder="Edit House Name">
                                </div>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Date Registered
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ ucfirst( \Carbon\Carbon::parse($property->created_at)->diffForHumans()) }} <span class="font-bold text-xs text-red-500">Unchanged</span>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Date Updated
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div wire:poll.5s>
                                    {{ ucfirst( \Carbon\Carbon::parse(now())->diffForHumans()) }} <span class="font-bold text-xs text-red-500">Unchanged</span>
                                </div>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Location
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" wire:model='location' name="location" id="location" value="{{ $property->location }}"
                                        class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                        autocomplete="" placeholder="Edit House Location">
                                </div>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Type
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" wire:model='type' name="type" id="type" value="{{ $property->type }}"
                                        class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                        autocomplete="" placeholder="Edit Type (Land, House, Apartment etc.)">
                                </div>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Status
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" wire:model='status' name="status" id="status" value="{{ $property->status }}"
                                        class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                        autocomplete="" placeholder="Edit Status (Rent, Sale, Lease etc.)">
                                </div>
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Terms
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select wire:model='terms'
                                        class="form-select focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300">
                                        <option selected disabled>Choose Terms</option>
                                        <option selected value="Daily">Daily</option>
                                        <option selected value="Weekly">Weekly</option>
                                        <option selected value="Monthly">Monthly</option>
                                        <option selected value="Yearly">Yearly</option>
                                    </select>
                                </div>
                            </dd>
                        </div>
                        
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Total Units
                            </dt>
                            <dd class="mt-1 text-sm text-blue-500 sm:mt-0 sm:col-span-2">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" wire:model='total_units' name="total_units" id="total_units" value="{{ $property->total_units }}"
                                        class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                        autocomplete="" placeholder="Edit Total Units Available">
                                </div>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Available Units
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" wire:model='available_units' name="available_units" id="available_units" value="{{ $property->available_units }}"
                                        class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                        autocomplete="" placeholder="Edit Remaining Units">
                                </div>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Price
                            </dt>
                            <dd class="mt-1 text-sm text-blue-500 sm:mt-0 sm:col-span-2 font-bold ">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="number" wire:model='price' name="price" id="price" value="{{ $property->price }}"
                                        class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                        autocomplete="" placeholder="Edit Price">
                                        
                                </div>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Description
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="flex rounded-md shadow-sm">
                                    <textarea type="text" wire:model='description' name="description" id="description"
                                        class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                        autocomplete="" placeholder="{{ $property->description }}"></textarea>
                                </div>
                            </dd>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="button" wire:click="edit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </dl>
                </form>
            </div>
        </div>
    
    </div>
</div>
