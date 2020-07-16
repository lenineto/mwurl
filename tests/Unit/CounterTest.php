<?php

namespace Tests\Unit;

use App\Counter;
use App\User;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    /**
     * A basic unit test example.
     * @return void
     */
    public function testExample()
    {
        $counter = new Counter();
        $this->assertTrue(true);
    }
}
