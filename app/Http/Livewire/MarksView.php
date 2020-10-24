<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Models\Student;
use App\Rules\HasClass;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MarksView extends Component
{
    public $results, $searchReg, $searchGrade, $terms, $term;
    public $students, $grades;

    // Event listeners
    protected $listeners = [
        'setRegNo' => 'setRegNo',
        'setGrade' => 'setGrade',
    ];

    // Rename validation attributes
    protected $validationAttributes = [
        'searchReg' => 'registration number',
        'searchGrade' => 'class',
    ];

    public function mount()
    {
        $this->searchReg = null;
        $this->searchGrade = null;
        $this->students = [];
        $this->grades = [];
        $this->terms = [1 => 1, 2 => 2, 3 => 3];
        $this->term = null;
        $this->results = [];
    }

    public function fetch()
    {
        $validatedData = $this->validate([
            'searchReg' => ['required', 'string', 'max:10', 'exists:students,reg_no'],
            'searchGrade' => ['required', 'string', 'alpha_dash', new HasClass],
            'term' => ['required', 'string', 'min:1'],
        ]);

        $gradeId = Grade::getGradeId($this->explodeSearch($validatedData['searchGrade']))->id;

        $result = DB::table('marks')
            ->join('students', 'marks.stu_reg_no', '=', 'students.reg_no')
            ->join('subjects', 'marks.subject_code', '=', 'subjects.code')
            ->select('marks.*', 'students.f_name', 'students.l_name', 'students.initials', 'subjects.subject')
            ->where([
                ['marks.stu_reg_no', '=', $validatedData['searchReg']],
                ['marks.grade_id', '=', $gradeId],
                ['marks.term', '=', $validatedData['term']],
            ])
            ->get()->toArray();

        $this->results = $result;
    }

    public function render()
    {
        return view('livewire.marks-view');
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

    public function setRegNo($value)
    {
        $this->searchReg = $value;
    }

    public function setGrade($value)
    {
        $this->searchGrade = $value;
    }

    /**
     * Explode 10-C (class) to [10m 'C']
     *
     * @param string $query
     * @return array
     */
    private function explodeSearch($query)
    {
        $arr = [$query, ''];
        if (strpos($query, "-") !== false) {
            $arr = explode("-", $query);
        }
        return $arr;
    }
}