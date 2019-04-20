<?php

function isValid($candidate)
{
    // strip spaces from the candidate
    $candidate = str_replace(' ', '', $candidate);

    // reject strings that aren't composed of only
    // two or more digits
    if (!preg_match('/^\d{2,}$/', $candidate)) {
        return false;
    }

    // double every second digit from starting from the right
    // if the result is > 9 subtract 9
    for ($i = strlen($candidate) - 2; $i >= 0; $i -= 2) {
        $digit = intval($candidate[$i]) * 2;
        if ($digit > 9) {
            $digit -= 9;
        }
        $candidate[$i] = strval($digit);
    }

    return array_sum(str_split($candidate)) % 10 == 0;
}