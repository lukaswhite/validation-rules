<?php


namespace Color;


use PHPUnit\Framework\TestCase;

class HexTest extends TestCase
{
    public function testImplementsRuleContract( )
    {
        $rule = new \Lukaswhite\Rules\Color\Hex( );

        $this->assertInstanceOf(
            \Illuminate\Contracts\Validation\Rule::class,
            $rule
        );
    }

    public function testReturnsMessage( )
    {
        $this->assertTrue( is_string( ( new \Lukaswhite\Rules\Color\Hex( ) )->message( ) ) );
    }

    public function testFailsWhenValueIsNotString( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', 1 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', 1.5 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', [ ] ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', false ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Date\Time( ) )->passes( 'value', new \stdClass( ) ) );
    }

    public function testFailures( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '123456') );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#afafah') );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#123abce') );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', 'aFaE3f') );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '123456') );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#afaf') );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#F0h') );
    }

    public function testPasses( )
    {
        $this->assertTrue( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#1f1f1F') );
        $this->assertTrue( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#AFAFAF') );
        $this->assertTrue( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#1AFFa1') );
        $this->assertTrue( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#222fff') );
        $this->assertTrue( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#F00') );
        $this->assertTrue( ( new \Lukaswhite\Rules\Color\Hex( ) )->passes( 'value', '#F00') );
    }
}