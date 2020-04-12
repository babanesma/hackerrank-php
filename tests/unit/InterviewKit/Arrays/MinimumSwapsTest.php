<?php

namespace Unit\Hackerrank\Arrays;

use Hackerrank\InterviewKit\Arrays\MinimumSwaps;
use PHPUnit\Framework\TestCase;

class MinimumSwapsTest extends TestCase
{
    /**
     * @var MinimumSwaps
     */
    protected $minimumSwaps;

    public function setUp(): void
    {
        $this->minimumSwaps = new MinimumSwaps();
    }

    /**
     * First 3 test cases to test the code provided by hackerrank
     *
     * @return array
     */
    public function simpleCasesProvider()
    {
        return [
            [[4, 3, 1, 2], 3],
            [[2, 3, 4, 1, 5], 3],
            [[1, 3, 5, 2, 4, 6, 7], 3]
        ];
    }

    /**
     * @dataProvider simpleCasesProvider
     */
    public function testMinimumSwapsSimpleCases($input, $output)
    {
        $swaps = $this->minimumSwaps->findMinimumSwaps($input);
        $this->assertEquals($output, $swaps);
    }
}
