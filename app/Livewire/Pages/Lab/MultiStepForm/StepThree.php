<?php

namespace App\Livewire\Pages\Lab\MultiStepForm;

use Livewire\Component;

class StepThree extends Component
{
    public $formData;

    public function mount($formData)
    {
        $this->formData = $formData;
    }

    public function render()
    {
        return view('livewire.pages.lab.multi-step-form.step-three', [
            'formData' => $this->formData
        ]);
    }
}
