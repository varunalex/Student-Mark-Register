<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
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
        return view('livewire.student-list', [
            'students' => $this->search ? Student::where('f_name', 'like', '%' . $this->search . '%')
                ->orWhere('l_name', 'like', '%' . $this->search . '%')
                ->orWhere('reg_no', 'like', '%' . $this->search . '%')->paginate(10) :
            Student::orderBy('id', 'desc')->paginate(10),
        ]);
    }
}