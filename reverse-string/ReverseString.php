<?php

declare(strict_types=1);

namespace Excercism\ReverseString;

use function strrev;

function reverseString(string $input): string
{
    return strrev($input);
//    return mb_strrev($input);
}
