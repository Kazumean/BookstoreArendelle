<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TelephoneRule implements Rule
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
        return preg_match('/^0\\d{1,4}-\\d{1,4}-\\d{3,4}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '電話番号はXXXX-XXXX-XXXXの形式で入力してください';
    }
}
