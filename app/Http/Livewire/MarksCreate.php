<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Rules\HasClass;
use Livewire\Component;

class MarksCreate extends Component
{
    public $alert, $alertMsg, $searchReg, $searchGrade, $searchSub, $students, $grades, $subjects;
    public $terms, $term, $marks;

    protected $listeners = [
        'setRegNo' => 'setRegNo',
        'setGrade' => 'setGrade',
        'setSub' => 'setSub',
    ];

    protected $validationAttributes = [
        'searchReg' => 'registration number',
        'searchGrade' => 'class',
        'searchSub' => 'subject',
    ];

    protected $messages = [

    ];

    public function mount()
    {
        $this->searchReg = null;
        $this->searchGrade = null;
        $this->searchSub = null;
        $this->students = [];
        $this->grades = [];
        $this->subjects = [];
        $this->terms = [1 => 1, 2 => 2, 3 => 3];
        $this->marks = null;
        $this->term = null;
        $this->alert = false;
        $this->alertMsg = '';
    }

    public function save()
    {
        $validatedData = $this->validate([
            'searchReg' => ['required', 'string', 'max:10', 'exists:students,reg_no'],
            'searchGrade' => ['required', 'string', 'alpha_dash', new HasClass],
            'searchSub' => ['required', 'string', 'alpha_dash', 'exists:subjects,code'],
            'marks' => ['required', 'string', 'min:0', 'max:100'],
            'term' => ['required', 'string', 'min:1'],
        ]);

        $gradeId = Grade::getGradeId($this->explodeSearch($validatedData['searchGrade']))->id;

        $data = [
            'stu_reg_no' => $validatedData['searchReg'],
            'subject_code' => $validatedData['searchSub'],
            'grade_id' => $gradeId,
            'marks' => $validatedData['marks'],
            'term' => $validatedData['term'],
        ];

        $exist = Mark::where([
            ['stu_reg_no', '=', $validatedData['searchReg']],
            ['subject_code', '=', $validatedData['searchSub']],
            ['grade_id', '=', $gradeId],
            ['term', '=', $validatedData['term']],
        ]);

        if (!$exist->get()->count()) {
            Mark::create($data);
            $this->alertMsg = "Record Added 🤙";
        } else {
            $uid = $exist->first()->id;
            Mark::where('id', $uid)->update(['marks' => $validatedData['marks']]);
            $this->alertMsg = "Marks Updated 🤙";
        }

        // Reset fields
        $this->searchSub = null;
        $this->marks = null;
        $this->term = null;
        $this->alert = true;
        $this->searchReg = $validatedData['searchReg'];
        $this->searchGrade = $validatedData['searchGrade'];

    }

    public function updatedSearchReg($value)
    {
        if (strlen($value) >= 2) {
            $this->students = Student::searchStudents($value, 7)->toArray();
        }
    }

    public function updatedSearchGrade($value)
    {
        if (strlen($value) >= 1) {
            $gc = $this->explodeSearch($value);
            $this->grades = Grade::searchGrades($gc, 7)->toArray();
        }
    }

    public function updatedSearchSub($value)
    {
        if (strlen($value) >= 2) {
            $this->subjects = Subject::searchSubjects($value, 7)->toArray();
        }
    }

    public function setRegNo($value)
    {
        $this->searchReg = $value;
    }

    public function setGrade($value)
    {
        $this->searchGrade = $value;
    }

    public function setSub($value)
    {
        $this->searchSub = $value;
    }

    public function render()
    {
        return view('livewire.marks-create');
    }

    private function explodeSearch($query)
    {
        $arr = [$query, ''];
        if (strpos($query, "-") !== false) {
            $arr = explode("-", $query);
        }
        return $arr;
    }

    public function resetAlert()
    {
        $this->alert = false;
        $this->alertMsg = '';
    }
}