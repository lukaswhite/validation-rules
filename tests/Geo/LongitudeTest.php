<?php

class LongitudeTest extends \PHPUnit\Framework\TestCase
{
    public function testImplementsRuleContract( )
    {
        $rule = new \Lukaswhite\Rules\Geo\Longitude( );

        $this->assertInstanceOf(
            \Illuminate\Contracts\Validation\Rule::class,
            $rule
        );
    }

    public function testReturnsMessage( )
    {
        $this->assertTrue( is_string( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->message( ) ) );
    }

    public function testFailsWhenValueIsNotNumeric( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', 'foo' ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', [ ] ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', false ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', new stdClass( ) ) );
    }

    public function testFailsWhenValueTooLow( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', -190 ) );
    }

    public function testFailsWhenValueTooHigh( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', 191 ) );
    }

    public function testPassesWhenValueIsValid( )
    {
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', 0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', 0.0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', -45 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', -45.0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', 45 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', 45.0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', -180 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', -180.0 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', 180 ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Longitude( ) )->passes( 'value', 180.0 ) );
    }
}
