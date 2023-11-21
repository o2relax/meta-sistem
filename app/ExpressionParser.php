<?php

namespace App;

class ExpressionParser
{
    public static function checkBrackets(string $expression): bool
    {
        $closeChar = [];

        foreach (str_split($expression) as $char) {
            $findOpenChar = match ($char) {
                '[' => ']',
                '(' => ')',
                '{' => '}',
                default => null,
            };

            if ($findOpenChar !== null) {
                $closeChar[] = $findOpenChar;
            }
            if ($closeChar !== []) {
                $checkCloseChar = match ($char) {
                    ']' => '[',
                    ')' => '(',
                    '}' => '{',
                    default => null,
                };

                if (null !== $checkCloseChar && $char !== array_pop($closeChar)) {
                    return false;
                }
            }
        }

        return $closeChar === [];
    }
}