<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Msisdn implements Rule
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
        if (substr($value, 0, 4) == '62811' || substr($value, 0, 4) == '62812' || substr($value, 0, 4) == '62813' || substr($value, 0, 4) == '62821' || substr($value, 0, 4) == '62822' || substr($value, 0, 4) == '62851' || substr($value, 0, 4) == '62852' || substr($value, 0, 4) == '62853') {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Format salah/bukan nomor Telkomsel';
    }
}
