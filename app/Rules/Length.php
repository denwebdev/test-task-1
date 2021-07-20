<?php

declare(strict_types=1);

namespace App\Rules;

use App\Actions\CheckLengthAction;
use Illuminate\Contracts\Validation\Rule;

class Length implements Rule
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
        return CheckLengthAction::execute($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.inn.length');
    }
}
