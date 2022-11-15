<?php

namespace App;

class Factorial
{
    public function factorial($n)
    {
        if (!is_int($n)) {
            return null;
        }
        if ($n ==0 || $n == 1) {
            return 1;
        } elseif ($n >1) {
            return $n * $this->factorial($n-1);
        } else {
            return null;
        }
    }
}
