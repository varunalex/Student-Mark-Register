<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    use WithPagination;

    public $search, $byGradeId, $confirmingStuDeletion, $alertD;

    protected $listeners = [
        'deleteStudent' => 'deleteStudent',
    ];

    public function updatingSearch($name, $value)
    {
        // Inbuilt method in WithPagination
        $this->resetPage();
    }

    public function mount()
    {
        $this->search = null;
        $this->confirmingStuDeletion = false;
        $this->alertD = false;
    }

    public function deleteStudent($id)
    {
        Student::where('id', $id)->delete();
        $this->alertD = true;
    }

    public function render()
    {
        if ($this->byGradeId) {
            return view('livewire.student-list', [
                'students' => $this->search ? Student::where(function ($query) {
                    $query->where('f_name', 'like', '%' . $this->search . '%')
                        ->orWhere('l_name', 'like', '%' . $this->search . '%')
                        ->orWhere('reg_no', 'like', '%' . $this->search . '%')->paginate(10);
                })->where('grade_id', $this->byGradeId) :
                Student::orderBy('id', 'desc')->where('grade_id', $this->byGradeId)->paginate(10),
            ]);
        }
        return view('livewire.student-list', [
            'students' => $this->search ? Student::where('f_name', 'like', '%' . $this->search . '%')
                ->orWhere('l_name', 'like', '%' . $this->search . '%')
                ->orWhere('reg_no', 'like', '%' . $this->search . '%')->paginate(10) :
            Student::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function resetAlert()
    {
        $this->alertD = false;
    }
}