<?php

namespace App\Livewire\Pages\Lab;

use Livewire\Component;

class MultiStepFormPage extends Component
{
    public $shippingMethod = "no";
    public $paymentMethod = "yes";
    public $name;
    public $email;

    public $currentStep = 1;
    public $totalSteps = 3;

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
        // Handle form submission logic here
    }

    public function render()
    {
        return view('livewire.pages.lab.multi-step-form-page');
    }
}
