<?php

namespace Hackerrank\InterviewKit\DynamicProgramming;

class DecibinaryNumbers
{

    protected $lastCalculated;

    protected $decibinaryLookup;

    public function __construct()
    {
        // load the first 2 numbers in lookup table
        $this->decibinaryLookup = [
            1 => 0, // 0
            2 => 1  // 1
        ];

        // set the last calculated number to 1
        $this->lastCalculated = 1;
    }

    public function lookupDecibinaryNumbers($x)
    {
        if (count($this->decibinaryLookup) >= $x) {
            return $this->decibinaryLookup[$x];
        }

        while (count($this->decibinaryLookup) < $x) {
            $this->lastCalculated++;
            $moreForms = $this->findDebicinaryRepresentation($this->lastCalculated);
            foreach ($moreForms as $f) {
                $this->decibinaryLookup[] = $f;
            }
        }
        return $this->decibinaryLookup[$x];
    }

    protected function findDebicinaryRepresentation($x)
    {
        $xforms = [$x];
        $digits = 2;
        $divisor = 2;

        while ($divisor <= $x) {
            $xforms = array_merge($xforms, $this->decibinaryFormsOfXInDigits($x, $digits));
            $divisor *= 2;
            $digits += 1;
        }

        return $xforms;
    }

    protected function decibinaryFormsOfXInDigits($x, $digits = 1)
    {
        $forms = [];
        $base = pow(2, $digits - 1);

        for ($i = 1; $i * $base <= $x; $i++) {
            $remainer = $x - ($i * $base);
            if ($digits > 2) {
                $lowerForms = $this->decibinaryFormsOfXInDigits($remainer, $digits - 1);
                foreach ($lowerForms as $f) {
                    $forms[] = (int) ($i . str_pad($f, $digits - 1, '0', STR_PAD_LEFT));
                }
            }
            $forms[] = $i * pow(10, $digits - 1) + ($x - ($i * $base));
        }
        sort($forms);
        return $forms;
    }
}
