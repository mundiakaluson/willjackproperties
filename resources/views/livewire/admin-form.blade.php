<div>
  <div>
      <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">Property Information</h3>
                  <p class="mt-1 text-sm text-gray-600">
                      This information will be displayed publicly so be careful what you share.
                  </p>
              </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
              <form wire:submit.prevent='new'>
                  @csrf
                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                          <div class="grid grid-cols-3 gap-6">
                              <div class="col-span-3 sm:col-span-2">
                                  <label for="name" class="block text-sm font-medium text-gray-700">
                                      Uploaded By
                                  </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                      <input type="number" wire:model='uploaded_by'
                                          name="uploaded_by" id="uploaded_by"
                                          class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                          autocomplete="" placeholder="Input your Admin ID: {{ Auth::id() }}">
                                  </div>
                              </div>
                              <div class="col-span-3 sm:col-span-2">
                                  <label for="name" class="block text-sm font-medium text-gray-700">
                                      Property Name
                                  </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                      <input type="text" wire:model='name' name="name" id="name"
                                          class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                          autocomplete="" placeholder="Brand New House in Vescon">
                                  </div>
                                  @error('name') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>
                          <div class="grid grid-cols-3 gap-6">
                              <div class="col-span-3 sm:col-span-2">
                                  <label for="name" class="block text-sm font-medium text-gray-700">
                                      Property Owner
                                  </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                      <select wire:model='owner_id'
                                          class="form-select focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300">
                                          <option selected disabled>Choose Landlord</option>
                                          @foreach ($users as $user)
                                                <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  @error('owner_id') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>

                          <div class="grid grid-cols-3 gap-6">
                              <div class="col-span-3 sm:col-span-2">
                                  <label for="location" class="block text-sm font-medium text-gray-700">
                                      Property Location
                                  </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                      <input type="text" wire:model='location' name="location" id="location"
                                          class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                          placeholder="Bamburi Kiembeni, Next to Fairfield">
                                  </div>
                                  @error('location') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                                  @enderror
                              </div>

                          </div>

                          <div class="grid grid-cols-3 gap-6">
                              <div class="col-span-3 sm:col-span-2">
                                  <label for="type" class="block text-sm font-medium text-gray-700">
                                      Property Type
                                  </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                      <input type="text" wire:model='type' name="type" id="type"
                                          class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                          placeholder="Land, House, Apartment etc.">
                                  </div>
                                  @error('type') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                                  @enderror
                              </div>

                          </div>

                          <div class="grid grid-cols-3 gap-6">
                              <div class="col-span-3 sm:col-span-2">
                                  <label for="status" class="block text-sm font-medium text-gray-700">
                                      Property Status
                                  </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                      <input type="text" wire:model='status' name="status" id="status"
                                          class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                          placeholder="For Rent/Sale">
                                  </div>
                                  @error('status') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                                  @enderror
                              </div>

                          </div>

                          <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="price" class="block text-sm font-medium text-gray-700">
                                    Property Price
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" wire:model='price' name="price" id="price"
                                        class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                        placeholder="20,000">
                                </div>
                                @error('price') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Property Terms
                                </label>
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
                                @error('terms') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6">
                          <div class="col-span-3 sm:col-span-2">
                              <label for="price" class="block text-sm font-medium text-gray-700">
                                  Total Units
                              </label>
                              <div class="mt-1 flex rounded-md shadow-sm">
                                  <input type="text" wire:model='total_units' name="total_units" id="total_units"
                                      class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                      placeholder="29">
                              </div>
                              @error('total_units') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                              @enderror
                          </div>

                      </div>

                      <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="price" class="block text-sm font-medium text-gray-700">
                                Available Units
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" wire:model='available_units' name="available_units" id="available_units"
                                    class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="18">
                            </div>
                            @error('available_units') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                          <div>
                              <label for="about" class="block text-sm font-medium text-gray-700">
                                  Property Description
                              </label>
                              <div class="mt-1">
                                  <textarea id="description" wire:model='description' name="description" rows="3"
                                      class="shadow-sm focus:ring-gray-500 focus:border-gray-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                      placeholder="The property is located in a serene environment..."></textarea>
                              </div>
                              <p class="mt-2 text-sm text-gray-500">
                                  Brief description about the property and detailed features that make it an
                                  attraction.
                              </p>
                              @error('description') <span class="mt-2 text-sm text-red-400">{{ $message }}</span>
                              @enderror
                          </div>
                          @include('components.picture-upload')
                      </div>
                      
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <button type="button" wire:click="new()"
                              class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              Save
                          </button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>