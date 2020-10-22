<?php

namespace App\Rules;

use App\Models\Grade;
use Illuminate\Contracts\Validation\Rule;

class UniqueClass implements Rule
{
    public $ref_value;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($ref)
    {
        $this->ref_value = $ref;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $mod = 0;

        if ($attribute == 'grade') {
            $mod = Grade::where('class', $this->ref_value)->where('grade', $value)->count();
        } elseif ($attribute == 'class') {
            $mod = Grade::where('grade', $this->ref_value)->where('class', $value)->count();
        }

        return $mod != 1;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is already exist.';
    }
}