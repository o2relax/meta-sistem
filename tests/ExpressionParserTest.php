<?php

namespace Tests;

use App\ExpressionParser;
use PHPUnit\Framework\TestCase;

class ExpressionParserTest extends TestCase
{

    /**
     * @dataProvider checkBracketsProvider
     * @param string $expression
     * @param bool $exceptedResult
     * @return void
     */
    public function testCheckBrackets(string $expression, bool $exceptedResult): void
    {
        $this->assertEquals($exceptedResult, ExpressionParser::checkBrackets($expression));
    }

    public function checkBracketsProvider(): array
    {
        return [
            'Success only brackets string'                 => ['[({})]', true],
            'Success with another chars'                   => ['ad[(d{sdf})]d', true],
            'Failure with opened but didnt close brackets' => ['[(fs{s})sdf', false],
            'Failure with closed but didnt open brackets'  => ['[fs{s})sdf]', false],
        ];
    }

}