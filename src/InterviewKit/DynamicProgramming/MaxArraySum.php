<?php

namespace Hackerrank\InterviewKit\DynamicProgramming;

class MaxArraySum
{
    public function maxSubsetSum($arr)
    {
        $incl = 0;
        $excl = 0;

        foreach ($arr as $i) {
            // Current max excluding $i
            $new_excl = max($excl, $incl);

            // Current max including i
            $incl = $excl + $i;
            $excl = $new_excl;
        }
        // return max of incl and excl
        return max($excl, $incl);
    }
}
