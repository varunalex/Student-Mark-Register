<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;

class SubjectEdit extends Component
{
    public $code, $temp_code;
    public $subject;
    public $subject_id;

    /**
     * Prepare the data for validation.
     *
     * @return void
     */

    protected $rules = [
        'code' => 'required|string|max:10|unique:subjects,code',
        'subject' => 'required|string|max:75',
    ];

    protected function prepareForValidation($attributes)
    {
        $attributes['code'] = $this->sanitizeCode($attributes['code']);

        return $attributes;
    }

    public function mount($subject)
    {
        $this->subject_id = $subject->id;
        $this->code = $subject->code;
        $this->temp_code = $subject->code;
        $this->subject = $subject->subject;
    }

    public function update()
    {
        // Skip unique validation if the value is not changed
        if ($this->temp_code == $this->sanitizeCode($this->code)) {
            $this->rules = [
                'code' => 'required|string|max:10',
                'subject' => 'required|string|max:75',
            ];
        }

        $validatedData = $this->validate();

        Subject::where('id', $this->subject_id)
            ->update($validatedData);

        $this->subject = $validatedData['subject'];
        $this->code = $validatedData['code'];

        session()->flash('alert', true);
        return redirect()->to('subject');
    }

    public function render()
    {
        return view('livewire.subject-edit');
    }

    protected function sanitizeCode($code)
    {
        return str_replace(" ", "", strtoupper($code));
    }

}