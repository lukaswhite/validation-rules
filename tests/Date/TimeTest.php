<?php

namespace Date;

class TimeTest extends \PHPUnit\Framework\TestCase
{
    public function testImplementsRuleContract( )
    {
        $rule = new \Lukaswhite\Rules\Date\Time( );

        $this->assertInstanceOf(
            \Illuminate\Contracts\Validation\Rule::class,
            $rule
        );
    }

    public function testReturnsMessage( )
    {
        $this->assertTrue( is_string( ( new \Lukaswhite\Rules\Date\Time( ) )->message( ) ) );
    }

    public function testFailsWhenValueIsNotString( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', 1 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', 1.5 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', [ ] ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', false ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', new \stdClass( ) ) );
    }

    public function testFailsWhenValueWrongLength( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', '12:123' ) );
    }

    public function testFailsWhenValueWrongFormat( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', '12-23' ) );
    }

    public function testFailsWhenHourTooHigh( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', '25:10' ) );
    }

    public function testFailsWhenMinuteTooHigh( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', '13:61' ) );
    }

    public function testPassesWhenValueIsValid( )
    {
        $this->assertTrue( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', '00:00' ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', '01:15' ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', '23:59' ) );
    }
}
