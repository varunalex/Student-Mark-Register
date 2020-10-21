<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class SubjectList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.subject-list', [
            'subjects' => Subject::orderBy('id', 'desc')->paginate(10),
        ]);
    }
}