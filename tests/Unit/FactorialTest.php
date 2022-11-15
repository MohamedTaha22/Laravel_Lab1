<?php

namespace Tests\Unit;

use App\Factorial;
use PHPUnit\Framework\TestCase;

class FactorialTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_factorial()
    {
        $test= new Factorial();
        $this->assertEquals(1, $test->factorial(0));
        $this->assertEquals(1, $test->factorial(1));
        $this->assertEquals(120, $test->factorial(5));
        $this->assertEquals(5 * $test->factorial(4), $test->factorial(5));
        $this->assertEquals(null, $test->factorial(-3));
        $this->assertEquals(null, $test->factorial(1.5));
        $this->assertEquals(null, $test->factorial(false));
        $this->assertEquals(null, $test->factorial('abc'));
    }
}
