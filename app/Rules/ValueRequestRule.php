<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValueRequestRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        switch ($attribute){
            case 'facebook-link':
                    $pattern='/(?:https?:\/\/)?(?:www.)?(?:facebook)(?:.com\/)?([@a-zA-Z0-9-_]+)/im';
                break;
            case 'linkedin-link':
                 $pattern='/(?:https?:\/\/)?(?:www.)?(?:linkedin)(?:.com\/)?([@a-zA-Z0-9-_]+)/im';
                break;
            case 'x-link':
                  $pattern='/(?:https?:\/\/)?(?:www.)?(?:twitter)(?:.com\/)?([@a-zA-Z0-9-_]+)/im';
                break;
            case 'instagram-link':
                  $pattern='/(?:https?:\/\/)?(?:www.)?(?:instagram)(?:.com\/)?([@a-zA-Z0-9-_]+)/im';
                break;
            case 'reddit-link':
                  $pattern='/(?:https?:\/\/)?(?:www.)?(?:reddit)(?:.com\/)?([@a-zA-Z0-9-_]+)/im';
                break;
            default:
                $pattern="#^https?://([a-z0-9-]+\.)*([a-z0-9-])\.com(/.*)?$#";
        }

        if (!preg_match($pattern, $value) && $value !== null){
            $fail('Not valid profile link.');
        }
    }
}
