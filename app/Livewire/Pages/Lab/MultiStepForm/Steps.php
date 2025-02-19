<?php

namespace App\Livewire\Pages\Lab\MultiStepForm;

use Livewire\Component;
use Livewire\Attributes\On;

class Steps extends Component
{
    public $formData = [
        'step1' => [
            'name' => '',
            'email' => '',
            'gender' => 'men'
        ],
        'step2' => [
            'address' => '',
            'phone' => ''
        ]
    ];

    #[On('updateFormData')]
    public function updateFormData($data)
    {
        $this->formData[$data['step']] = array_filter([
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'gender' => $data['gender'] ?? null,
            'address' => $data['address'] ?? null,
            'phone' => $data['phone'] ?? null
        ]);
    }

    public $current = 'App\Livewire\Pages\Lab\MultiStepForm\StepOne';

    protected $steps = [
        'App\Livewire\Pages\Lab\MultiStepForm\StepOne',
        'App\Livewire\Pages\Lab\MultiStepForm\StepTwo',
        'App\Livewire\Pages\Lab\MultiStepForm\StepThree'
    ];

    public function back()
    {
        $currentIndex = array_search($this->current, $this->steps);
        $this->current = $this->steps[$currentIndex - 1];
    }

    public function isFirstStep()
    {
        return $this->current === $this->steps[0];
    }

    public function next()
    {
        $currentIndex = array_search($this->current, $this->steps);

        $this->current = $this->steps[$currentIndex + 1];
    }

    public function isLastStep()
    {
        return $this->current === end($this->steps);
    }

    public function submit()
    {
        // Handle form submission logic here
    }

    public function render()
    {
        return view('livewire.pages.lab.multi-step-form.todo-list', [
            'formData' => $this->formData,
            'steps' => $this->steps
        ]);
    }
}
