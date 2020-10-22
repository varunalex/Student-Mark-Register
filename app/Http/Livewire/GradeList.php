<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use Livewire\Component;
use Livewire\WithPagination;

class GradeList extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch($name, $value)
    {
        // Inbuilt method in WithPagination
        $this->resetPage();
    }

    public function mount()
    {
        $this->search = null;
    }

    public function render()
    {

        return view('livewire.grade-list', [
            'grades' => $this->search ? Grade::where('grade', $this->search)->orWhere('class', strtoupper($this->search))->paginate(10) :
            Grade::orderBy('id', 'desc')->paginate(10),

        ]);
    }
}