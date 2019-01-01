<?php

namespace Geo\Uk;

class PostcodeTest extends \PHPUnit\Framework\TestCase
{
    public function testImplementsRuleContract( )
    {
        $rule = new \Lukaswhite\Rules\Geo\Uk\Postcode( );

        $this->assertInstanceOf(
            \Illuminate\Contracts\Validation\Rule::class,
            $rule
        );
    }

    public function testReturnsMessage( )
    {
        $this->assertTrue( is_string( ( new \Lukaswhite\Rules\Geo\Uk\Postcode( ) )->message( ) ) );
    }

    public function testReturnsTrueForValidPostcodes( )
    {
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Uk\Postcode( ) )->passes( 'value', 'B20 1BP' ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Uk\Postcode( ) )->passes( 'value', 'B201BP' ) );
        $this->assertTrue( ( new \Lukaswhite\Rules\Geo\Uk\Postcode( ) )->passes( 'value', 'b2 01  bp  ' ) );
    }

    public function testReturnsFalseForInvalidPostcodes( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Uk\Postcode( ) )->passes( 'value', 'foo' ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Uk\Postcode( ) )->passes( 'value', 3 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Uk\Postcode( ) )->passes( 'value', true ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Geo\Uk\Postcode( ) )->passes( 'value', 1.3 ) );
    }

}
