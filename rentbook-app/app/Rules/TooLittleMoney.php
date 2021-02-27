<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TooLittleMoney implements Rule
{
    public $cost;

    public $count;

    public $coefficient;
    /**
     * Create a new rule instance.
     *
     *
     * @return void
     */
    public function __construct($cost, $count)
    {
        $this->cost = $cost;
        $this->count = $count;
        $this->coefficient = 0.3;
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
        if ($this->cost * $this->count * $this->coefficient <= (int)$value) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Too little deposit specified ';
    }
}
