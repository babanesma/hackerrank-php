# Dynamic Programming

All challenges are found [here](https://www.hackerrank.com/interview/interview-preparation-kit/dynamic-programming/challenges)

## 1. Max Array Sum [challenge] (https://www.hackerrank.com/challenges/max-array-sum/problem)

The solution is very simple , just initiate 2 zero sums 
- $excl is the maximum sum excluding the previous element 
- $incl is the maximum sum including the the previous element
At the end of the loop return max of incl and excl.
More info (here)[https://www.geeksforgeeks.org/maximum-sum-such-that-no-two-elements-are-adjacent/]

## 2. Decibinary Numbers [challenge](https://www.hackerrank.com/challenges/decibinary-numbers/problem)

This is very hard and complicated question. Here is how I thought about it.
According to the question description , a number in the decibinary system should be interpreted with the following equation .

    2016<sub>decibinary</sub> = 2*2<sup>3</sup> + 0 * 2<sup>2</sup> + 1 * 2<sup>1</sup>+ 6 * 2<sup>0</sup> = (24)<sub>decimal</sub>

But there is a problem , 2008 in decibinary also can be interpreted as 24 in decimal.

So we are going to order based on their decimal value , then based on decibinary value

Here is the list of first 20 number .

x | Decibinary  | Decimal 
--|-------------|---------
1 |     0       | 0
2 |     1       | 1
3 |     2       | 2
4 |     10      | 2
5 |     3       | 3 
6 |     11      | 3 
7 |     4       | 4
8 |     12      | 4 
9 |     20      | 4
10|     100     | 4
11|     5       | 5 
12|     13      | 5
13|     21      | 5 
14|     101     | 5
15|     6       | 6
16|     14      | 6 
17|     22      | 6
18|     30      | 6
19|     102     | 6
20|     110     | 6

I noticed that every number in decimal can be interpreted in many forms in decibinary system, the first one is the decimal value , and the last one is the binary value.

So if we want to know all the forms of number 5 .
```php
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
```
I am trying to find all possible form of using 2 digits in decibinary , then 3 digits .
There is no form using 4 digits at the minimum value is 8 which is greater than 5

Finding decibinary value for more than 2 digits can be done recurisvely , take a look at the possible forms of 7.

x | Decibinary  | Decimal 
--|-------------|---------
21|     7       |   7
22|     15      |   7
23|     23      |   7
24|     31      |   7
25|     103     |   7
26|     111     |   7

For indices `25` and `26` you will find the first digit is `1` that represents `1*2<sup>2</sup> = 4`, so the remainer is 3 . You will find that `03` and `11` are the possible decibinary values of `3`.

That's how `decibinaryFormsOfXInDigits` is implemented.

```php
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
```

The rest is lookup table to find the decibinary value at index $x.

### Improvements needed 
- Figure better solution to find the value of `$x` instead of loading all the lookup table till we find `$x`