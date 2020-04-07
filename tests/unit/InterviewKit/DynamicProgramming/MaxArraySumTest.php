<?php

namespace Unit\Hackerrank\InterviewKit\DynamicProgramming;

use Hackerrank\InterviewKit\DynamicProgramming\MaxArraySum;
use PHPUnit\Framework\TestCase;

class MaxArraySumTest extends TestCase
{
    /**
     * @var MaxArraySum
     */
    protected $maxArraySum;

    protected function setUp(): void
    {
        $this->maxArraySum = new MaxArraySum();
    }

    public function maxArraySumProvider()
    {
        return [
            [[3, 7, 4, 6, 5], 13],
            [[2, 1, 5, 8, 4], 11],
            [[3, 5, -7, 8, 10], 15]
        ];
    }

    /**
     * @dataProvider maxArraySumProvider
     */
    public function testMaxArraySum($input, $output)
    {
        $this->assertEquals($output, $this->maxArraySum->maxSubsetSum($input));
    }
}
