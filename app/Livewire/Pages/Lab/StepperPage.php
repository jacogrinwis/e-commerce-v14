<?php

namespace App\Livewire\Pages\Lab;

use Livewire\Component;

class StepperPage extends Component
{
    public $currentStep = 1;
    public $steps = [
        1 => 'Verzendmethode',
        2 => 'Betaalmethode',
        3 => 'Bevestiging'
    ];
    public $shippingMethod = 'pickup';
    public $shippingMethods = [
        'pickup' => ['name' => 'Ophalen in winkel', 'cost' => 0],
        'postnl-standard' => ['name' => 'PostNL Standaard', 'cost' => 4.95],
        'postnl-track-trace' => ['name' => 'PostNL met track & trace', 'cost' => 4.95],
        'dhl-standard' => ['name' => 'DHL Standaard', 'cost' => 4.95],
        'dhl-track-trace' => ['name' => 'DHL met track & trace', 'cost' => 4.95],
        'homerr' => ['name' => 'Homerr', 'cost' => 4.95]
    ];
    public $paymentMethod = 'banktransfer';
    public $paymentMethods = [
        'banktransfer' => 'Bankoverschrijving',
        'tikkie' => 'Tikkie',
        'paypal' => 'PayPal',
        'contant' => 'In winkel'
    ];
    public $notes;

    public function getShippingName()
    {
        return $this->shippingMethods[$this->shippingMethod]['name'];
    }

    public function getPaymentName()
    {
        return $this->paymentMethods[$this->paymentMethod];
    }

    public function nextStep()
    {
        if ($this->currentStep === 1 && !isset($this->shippingMethods[$this->shippingMethod])) {
            return;
        }

        if ($this->currentStep === 2 && !isset($this->paymentMethods[$this->paymentMethod])) {
            return;
        }

        $this->currentStep = min(3, $this->currentStep + 1);
    }

    public function previousStep()
    {
        $this->currentStep = max(1, $this->currentStep - 1);
    }

    public function render()
    {
        return view('livewire.pages.lab.stepper-page');
    }
}
