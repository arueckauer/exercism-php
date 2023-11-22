<?php

declare(strict_types=1);

class HighSchoolSweetheart
{
    private static string $asciiHeartTemplate = <<<EOT
     ******       ******
   **      **   **      **
 **         ** **         **
**            *            **
**                         **
**     %s  +  %s     **
 **                       **
   **                   **
     **               **
       **           **
         **       **
           **   **
             ***
              *
EOT;

    public function firstLetter(string $name): string
    {
        return substr(trim($name), 0, 1);
    }

    public function initial(string $name): string
    {
        return strtoupper($this->firstLetter($name)) . '.';
    }

    public function initials(string $name): string
    {
        if (str_contains($name, ' ') === false) {
            throw new InvalidArgumentException('Name must have a space');
        }

        if (substr_count($name, ' ') > 1) {
            throw new InvalidArgumentException('Name must have only one space');
        }

        [$firstName, $lastName] = explode(' ', $name);

        return $this->initial($firstName) . ' ' . $this->initial($lastName);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        return sprintf(
            self::$asciiHeartTemplate,
            $this->initials($sweetheart_a),
            $this->initials($sweetheart_b),
        );
    }
}
