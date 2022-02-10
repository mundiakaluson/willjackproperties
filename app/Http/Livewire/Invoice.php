<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Livewire\Component;
use App\Models\User;
use LaravelDaily\Invoices\Invoice as In;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;


class Invoice extends Component
{

    public $landlords, $email, $selected_landlord, $owned_properties, $invoice_title,
            $landlord_id, $invoice_status, $tax, $rent_collection, $selected_property;

    public function mount () {
        $this->landlords = User::where('is_admin', 0)->get();
    }

    public function updated () {
        $this->landlord_id = User::where('id', $this->selected_landlord)->get();
        $this->email = $this->landlord_id[0]->email;
        $this->owned_properties = Property::where('owner_id', $this->landlord_id[0]->id)->get();
    }

    public function generateInvoice () {
        // dd($this->invoice_title, $this->rent_collection, $this->selected_property, $this->tax, $this->invoice_status, $this->email);

        $customer = new Buyer([
            'name' => $this->landlord_id[0]->name,
            'custom_fields' => [
                'email' => $this->email
            ],
        ]);

        $item = (new InvoiceItem())->title($this->invoice_title)->pricePerUnit($this->rent_collection);

        $invoice = In::make()
                    ->buyer($customer)
                    ->taxRate($this->tax)
                    ->addItem($item);

        $invoice->stream();
    }

    public function render()
    {
        return view('livewire.invoice');
    }
}
