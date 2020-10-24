<?php

namespace App\Rules;

use App\Models\Grade;
use Illuminate\Contracts\Validation\Rule;

class HasClass implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $newValue = $this->explodeInput($value);
        $mod = Grade::where('grade', $newValue[0])->where('class', $newValue[1])->count();
        return $mod == 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is invalid.';
    }

    private function explodeInput($query)
    {
        $arr = [$query, ''];
        if (strpos($query, "-") !== false) {
            $arr = explode("-", $query);
        }
        return $arr;
    }
}