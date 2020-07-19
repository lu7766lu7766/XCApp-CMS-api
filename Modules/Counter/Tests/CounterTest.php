<?php

namespace Modules\Counter\Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Counter\Entities\Counter;
use Modules\Counter\Entities\CounterTraitHelper;
use Tests\TestCase;

class CounterTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function incrementRecord()
    {
        $fake = new class extends Model
        {
            use CounterTraitHelper;

            public function __construct(array $attributes = [])
            {
                parent::__construct($attributes);
                /** @noinspection PhpUndefinedFieldInspection */
                $this->id = 1;
            }
        };
        $result = $fake->incrementRecord();
        $this->assertInstanceOf(Counter::class, $result);
        $this->assertEquals(1, $result->record);
    }
}
