<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function create () {
        app('App\Http\Livewire\Invoice')->generateInvoice();
    }
}
