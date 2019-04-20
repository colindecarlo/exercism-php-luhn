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
    $candidate = strrev($candidate);
    for ($i = 1; $i < strlen($candidate); $i += 2) {
        if ($candidate[$i] == '9') {
            continue;
        }
        $candidate[$i] = ($candidate[$i] * 2) % 9;
    }

    return array_sum(str_split($candidate)) % 10 == 0;
}