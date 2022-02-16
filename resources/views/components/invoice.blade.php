<section class="p-6 dark:bg-coolGray-800 dark:text-coolGray-50">
	<form wire:submit.prevent='' novalidate="" method="POST" action="admin/invoice/create" class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">
        @csrf
		<fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
			<div class="space-y-2 col-span-full lg:col-span-1">
				<p class="font-medium">Invoice Inormation</p>
				<p class="text-xs">Quick Inoive creation for property rent.</p>
			</div>
			<div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
				<div class="col-span-full sm:col-span-3">
					<label for="" class="text-sm">Landlord Name</label>
					<select wire:model='selected_landlord'
                        class="form-select focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300">
                        @foreach ($landlords as $landlord)
                            <option value="{{ $landlord->id }}">{{ $landlord->id }}: {{ $landlord->name }}</option>
                        @endforeach
                    </select>
				</div>
				<div class="col-span-full sm:col-span-3">
					<label for="email" class="text-sm">Landlord Email</label>
					<input wire:model='email' disabled id="email" value="{{ $email }}" type="text" placeholder="" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
				</div>
				<div class="col-span-full sm:col-span-3">
					<label for="email" class="text-sm">Invoice Title</label>
					<input id="invoice_title" wire:model='invoice_title' type="text" placeholder="Invoice Title" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-gray-400 dark:border-coolGray-700 dark:text-coolGray-900">
				</div>
				<div class="col-span-full">
				zas	<label for="address" class="text-sm">Properties for Landlord:</label>
                    @if (!empty($owned_properties))
                        <select wire:model='selected_property' class="form-select focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300">
                            @foreach ($owned_properties as $owned_property)
                                <option value="{{ $owned_property->id }}">{{ $owned_property->name }}</option>
                            @endforeach
                        </select>
                    @elseif (empty($owned_properties))
                        
                    @endif
				</div>
				<div class="col-span-full sm:col-span-2">
					<label for="rent_collection" class="text-sm">Rent Collection</label>
					<input wire:model='rent_collection' id="rent_collection" type="text" placeholder="" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
				</div>
				<div class="col-span-full sm:col-span-2">
					<label for="taxt" class="text-sm">Tax Rate % (Commercial Properties)</label>
					<input wire:model='tax' id="tax" type="text" placeholder="" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
				</div>
				<div class="col-span-full sm:col-span-2">
					<label for="invoice_status" class="text-sm">Invoice Status</label>
					<select wire:model='invoice_status' class="form-select focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded-lg rounded-r-md sm:text-sm border-gray-300">
                        <option value="paid">Paid</option>
                        <option value="unpaid">Unpaid</option>
                    </select>
				</div>
                <input type="submit" wire:click="generateInvoice()" placeholder="Generate Invoice"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    
			</div>
		</fieldset>
	</form>
</section>