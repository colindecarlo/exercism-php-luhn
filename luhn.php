<?php

function isValid($candidate)
{
    if (cantBeValidated(stripSpaces($candidate))) {
        return false;
    }

    return isDivisibleByTen(calculateSum(stripSpaces($candidate)));
}

function isDivisibleByTen($dividend)
{
    return $dividend % 10 == 0;
}

function calculateSum($candidate)
{
    // convert every second digit starting from the end of the
    // candidate string
    for ($i = strlen($candidate) - 2; $i >= 0; $i -= 2) {
        $candidate[$i] = convertDigit($candidate[$i]);
    }

    return array_sum(str_split($candidate));
}

function convertDigit($digit)
{
    $digit = intval($digit) * 2;
    if ($digit > 9) {
        $digit -= 9;
    }

    return strval($digit);
}

function cantBeValidated($candidate)
{
    return !preg_match('/^\d{2,}$/', $candidate);
}

function stripSpaces($candidate)
{
    return str_replace(' ', '', $candidate);
}