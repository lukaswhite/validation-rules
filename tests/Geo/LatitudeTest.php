<?php

class LatitudeTest extends \PHPUnit\Framework\TestCase
{
    public function testImplementsRuleContract( )
    {
        $rule = new \Lukaswhite\Rules\Geo\Latitude( );

        $this->assertInstanceOf(
            \Illuminate\Contracts\Validation\Rule::class,
            $rule
        );
    }

    public function testReturnsMessage( )
    {
        $this->assertTrue( is_string( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->message( ) ) );
    }

    public function testFailsWhenValueIsNotNumeric( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', 'foo' ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', [ ] ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', false ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', new stdClass( ) ) );
    }

    public function testFailsWhenValueTooLow( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', -100 ) );
    }

    public function testFailsWhenValueTooHigh( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', 91 ) );
    }

    public function testPassesWhenValueIsValid( )
    {
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', 0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', 0.0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', -45 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', -45.0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', 45 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', 45.0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', -90 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', -90.0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', 90 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Latitude( ) )->passes( 'value', 90.0 ) );
    }
}
