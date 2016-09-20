<?php

namespace Shooka\ModelEvents\Tests;

class ModelEventServiceProviderTest extends TestCase
{

    /** @test */
    public function it_loads_the_specified_listeners()
    {
        //
    }

    /** @test */
    public function it_should_not_save_when_person_has_no_name()
    {
        $person = new Person();
        $saved = $person->save();

        $this->assertFalse($saved);
    }

    /** @test */
    public function it_should_save_when_person_has_a_name()
    {
        Person::unguard(true);
        $person = new Person(['name' => 'Peter']);
        $saved = $person->save();

        $this->assertTrue($saved);
    }

    /** @test */
    public function it_should_save_when_person_has_no_name_and_the_listeners_are_flushed()
    {
        Person::flushEventListeners();
        $person = new Person();
        $saved = $person->save();

        $this->assertTrue($saved);
    }
}
