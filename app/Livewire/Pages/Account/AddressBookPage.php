<?php

namespace App\Livewire\Pages\Account;

use App\Models\Address;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddressBookPage extends Component
{
    public $addresses;
    public $showForm = false;
    public $editingAddress = null;

    public $name = '';
    public $email = '';
    public $phone = '';
    public $street = '';
    public $house_number = '';
    public $postal_code = '';
    public $city = '';
    public $country = '';
    public $is_default = false;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'street' => 'required|min:2',
        'house_number' => 'required',
        'postal_code' => 'required',
        'city' => 'required|min:2',
        'country' => 'required|min:2',
    ];

    public function mount()
    {
        $this->loadAddresses();
    }

    public function loadAddresses()
    {
        $this->addresses = Auth::user()->addresses;
    }

    public function create()
    {
        $this->reset(['name', 'street', 'house_number', 'postal_code', 'city', 'is_default']);
        $this->editingAddress = null;
        $this->showForm = true;
    }

    public function edit(Address $address)
    {
        $this->editingAddress = $address;
        $this->name = $address->name;
        $this->phone = $address->phone;
        $this->street = $address->street;
        $this->house_number = $address->house_number;
        $this->postal_code = $address->postal_code;
        $this->city = $address->city;
        $this->country = $address->country;
        $this->is_default = $address->is_default;
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->is_default) {
            Auth::user()->addresses()->update(['is_default' => false]);
        }

        $addressData = [
            'name' => $this->name,
            'email' => $this->email,
            'street' => $this->street,
            'house_number' => $this->house_number,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'country' => $this->country,
            'phone' => $this->phone,
            'is_default' => $this->is_default,
        ];

        if ($this->editingAddress) {
            $this->editingAddress->update($addressData);
        } else {
            Auth::user()->addresses()->create($addressData);
        }

        $this->showForm = false;
        $this->loadAddresses();
    }

    public function delete(Address $address)
    {
        $address->delete();
        $this->loadAddresses();
    }

    public function render()
    {
        return view('livewire.pages.account.address-book-page');
    }
}
