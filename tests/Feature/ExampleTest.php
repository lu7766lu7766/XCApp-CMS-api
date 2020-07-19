<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        \Storage::cloud()->append('house/test.txt', '123asd');
//        dd(env('LOG_CHANNEL'), \Log::driver());
        \Log::debug('abc');
    }
}
