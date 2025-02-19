<?php

namespace App\Livewire\Pages\Lab\MultiStepForm;

use Livewire\Component;
use Livewire\Attributes\On;

class StepOne extends Component
{
    public $name = '';
    public $email = '';
    public $gender = '';

    public function mount($formData)
    {
        $this->name = $formData['step1']['name'];
        $this->email = $formData['step1']['email'];
        $this->gender = $formData['step1']['gender'];
    }

    #[On('updated')]
    public function updated()
    {
        $this->dispatch('updateFormData', [
            'step' => 'step1',
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender
        ]);
    }

    public function render()
    {
        return view('livewire.pages.lab.multi-step-form.step-one');
    }
}
