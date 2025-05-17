<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Services\RecaptchaService;

class Recaptcha implements ValidationRule
{
    protected RecaptchaService $service;

    public function __construct(RecaptchaService $service)
    {
        $this->service = $service;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->service->verify($value)) {
            $fail('Не вдалося пройти перевірку reCAPTCHA.');
        }
    }
}