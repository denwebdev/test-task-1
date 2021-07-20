<?php

namespace App\Rules;

use App\Services\InnInterface;
use Illuminate\Contracts\Validation\Rule;

class CorrectInnValue implements Rule
{
    private InnInterface $inn;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->inn = app(InnInterface::class);
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
        return $this->inn->correct($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.inn.correct');
    }
}
