<?php

namespace Hackerrank\InterviewKit\Arrays;

class MinimumSwaps
{
    public function findMinimumSwaps($popularity)
    {
        // clone and sort popularity array
        $sortedPopularity = array_slice($popularity, 0);
        sort($sortedPopularity);

        $popularityLookup = array_flip($popularity);
        $swaps = 0;

        for ($i = 0; $i < count($popularity); $i++) {
            $correctValue = $sortedPopularity[$i];
            $v = $popularity[$i];

            if ($v != $correctValue) {
                $toSwapId = $popularityLookup[$correctValue];

                [$popularity[$toSwapId], $popularity[$i]] = [$popularity[$i], $popularity[$toSwapId]];

                $popularityLookup[$v] = $toSwapId;
                $popularityLookup[$correctValue] = $i;

                $swaps++;
            }
        }

        return $swaps;
    }
}
