<?php

namespace App\Services;

class FormService
{
    public function getCanadianFields(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'account_number',
            'passport_series',
            'passport_number',
        ];
    }

    public function getWorldwideFields(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'account_number',
            'passport_number',
        ];
    }
}
