<?php

declare(strict_types=1);

class SimpleCipher
{
    private const LOWERCASE_LETTERS = 'abcdefghijklmnopqrstuvwxyz';
    private const LETTERS           = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz';

    public function __construct(
        public ?string $key = null
    ) {
        if ($this->key === null) {
            $this->key = $this->generateRandomKey();
        }

        if ($this->key === '') {
            throw new InvalidArgumentException('Key must be at least 1 character long');
        }

        if (preg_match('/[^a-z]/', $this->key)) {
            throw new InvalidArgumentException('Key must be lowercase letters only');
        }
    }

    public function encode(string $plainText): string
    {
        return $this->cipher($plainText, 1);
    }

    public function decode(string $cipherText): string
    {
        return $this->cipher($cipherText, -1);
    }

    public function cipher(string $cipherText, int $sign): string
    {
        $stringLength = strlen($cipherText);
        $keyLength    = strlen($this->key);
        for ($i = 0; $i < $stringLength; $i++) {
            $numberOfPlaces = strpos(self::LOWERCASE_LETTERS, $this->key[$i % $keyLength]);
            $cipherText[$i] = $this->rotate($cipherText[$i], $sign * $numberOfPlaces);
        }

        return $cipherText;
    }

    private function rotate(string $character, int $numberOfPlaces): string
    {
        $numberOfPlaces %= 26;

        if (! $numberOfPlaces) {
            return $character;
        }

        if ($numberOfPlaces < 0) {
            $numberOfPlaces += 26;
        }

        $to = substr(self::LETTERS, $numberOfPlaces * 2) . substr(self::LETTERS, 0, $numberOfPlaces * 2);

        return strtr($character, self::LETTERS, $to);
    }

    private function generateRandomKey(): string
    {
        return substr(
            str_shuffle(
                str_repeat(
                    self::LOWERCASE_LETTERS,
                    (int) ceil(100 / strlen(self::LOWERCASE_LETTERS))
                )
            ),
            1,
            100
        );
    }
}
