<?php

namespace Geo\Us;

class ZipcodeTest extends \PHPUnit\Framework\TestCase
{
    public function testImplementsRuleContract( )
    {
        $rule = new \Lukaswhite\Rules\Geo\Us\Zipcode( );

        $this->assertInstanceOf(
            \Illuminate\Contracts\Validation\Rule::class,
            $rule
        );
    }

    public function testReturnsMessage( )
    {
        $this->assertTrue( is_string( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->message( ) ) );
    }

    public function testReturnsTrueForValidPostcodes( )
    {
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->passes( 'value', '63101' ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->passes( 'value', '27565' ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->passes( 'value', '97225' ) );
    }

    public function testReturnsFalseForInvalidPostcodes( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->passes( 'value', 'foo' ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->passes( 'value', 3 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->passes( 'value', true ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->passes( 'value', 1.3 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->passes( 'value', '123456789' ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Us\Zipcode( ) )->passes( 'value', '123' ) );
    }

}
