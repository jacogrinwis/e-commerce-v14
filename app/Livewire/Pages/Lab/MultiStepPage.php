<?php

namespace App\Livewire\Pages\Lab;

use Livewire\Component;

class MultiStepPage extends Component
{
    public $currentStep = 1;
    public $totalSteps = 3;

    public $shippingMethod = "deliver";
    public $paymentMethod = "banktransfer";

    // public function shippingMethodUpdated()
    // {
    //     $this->render();
    // }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function nextStep()
    {
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function submit()
    {
        dump("shippingMethod: " . $this->shippingMethod, "paymentMethod: " . $this->paymentMethod);
    }

    public function render()
    {
        return view('livewire.pages.lab.multi-step-page');
    }
}
