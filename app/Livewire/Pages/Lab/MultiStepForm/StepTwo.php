<?php

namespace App\Livewire\Pages\Lab\MultiStepForm;

use Livewire\Component;
use Livewire\Attributes\On;

class StepTwo extends Component
{
    public $address = '';
    public $phone = '';

    public function mount($formData)
    {
        $this->address = $formData['step2']['address'];
        $this->phone = $formData['step2']['phone'];
    }

    #[On('updated')]
    public function updated()
    {
        $this->dispatch('updateFormData', [
            'step' => 'step2',
            'address' => $this->address,
            'phone' => $this->phone
        ]);
    }

    public function render()
    {
        return view('livewire.pages.lab.multi-step-form.step-two');
    }
}
