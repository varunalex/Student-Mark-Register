<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class SubjectList extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch($name, $value)
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->search = null;
    }

    public function render()
    {
        return view('livewire.subject-list', [
            'subjects' => $this->search ? Subject::where('code', 'like', '%' . $this->search . '%')
                ->orWhere('subject', 'like', '%' . $this->search . '%')
                ->paginate(10) :
            Subject::orderBy('id', 'desc')->paginate(10),
        ]);
    }
}