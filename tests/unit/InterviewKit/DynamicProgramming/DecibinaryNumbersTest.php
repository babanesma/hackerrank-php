<?php

namespace Unit\Hackerrank\InterviewKit\DynamicProgramming;

use Hackerrank\InterviewKit\DynamicProgramming\DecibinaryNumbers;
use PHPUnit\Framework\TestCase;

class DecibinaryNumbersTest extends TestCase
{
    /**
     * @var DecibinaryNumbers
     */
    protected $decibinaryNumbers;

    public function setUp(): void
    {
        $this->decibinaryNumbers = new DecibinaryNumbers();
    }

    /**
     * First 3 test cases to test the code provided by hackerrank
     *
     * @return array
     */
    public function simpleCasesProvider()
    {
        return [
            [[1, 2, 3, 4, 10], [0, 1, 2, 10, 100]],
            [[8, 23, 19, 16, 26, 7, 6], [12, 23, 102, 14, 111, 4, 11]],
            [[19, 25, 6, 8, 20, 10, 27, 24, 30, 11], [102, 103, 11, 12, 110, 100, 8, 31, 32, 5]]
        ];
    }

    /**
     * @dataProvider simpleCasesProvider
     */
    public function testFindDecibinaryNumbersSimpleCases($input, $output)
    {
        foreach ($input as $k => $value) {
            $decivValue = $this->decibinaryNumbers->lookupDecibinaryNumbers($value);
            $this->assertEquals($output[$k], $decivValue);
        }
    }
}
