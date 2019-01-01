<?php


namespace Color;


use PHPUnit\Framework\TestCase;

class RgbTest extends TestCase
{
    public function testImplementsRuleContract( )
    {
        $rule = new \Lukaswhite\Rules\Color\Rgb( );

        $this->assertInstanceOf(
            \Illuminate\Contracts\Validation\Rule::class,
            $rule
        );
    }

    public function testReturnsMessage( )
    {
        $this->assertTrue( is_string( ( new \Lukaswhite\Rules\Color\Rgb( ) )->message( ) ) );
    }

    public function testFailsWhenValueIsNotArray( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes( 'value', 'color' ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes( 'value', 1 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes( 'value', 1.5 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes( 'value', false ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes( 'value', new \stdClass( ) ) );
    }

    public function testFailsWhenWrongNumberOfArrayElements( )
    {
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'green' =>  50,
                    'blue'  =>  255,
                    'foo'   =>  1,
                ]
            )
        );
    }

    public function testFailsWhenColorMissing( )
    {
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'blue'  =>  255,
                    'foo'   =>  1,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'b'  =>  255,
                    'f'   =>  1,
                ]
            )
        );
    }

    public function testFailsWhenColorOutOfRange( )
    {
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'red'   =>  -1,
                    'green' =>  50,
                    'blue'  =>  255,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'green' =>  -20,
                    'blue'  =>  255,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'green' =>  50,
                    'blue'  =>  -40,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'red'   =>  256,
                    'green' =>  50,
                    'blue'  =>  255,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'red'   =>  -10,
                    'green' =>  300,
                    'blue'  =>  255,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'red'   =>  300,
                    'green' =>  50,
                    'blue'  =>  290,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'r'   =>  -1,
                    'g' =>  50,
                    'b'  =>  255,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  -20,
                    'b'  =>  255,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  50,
                    'b'  =>  -40,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'r'   =>  256,
                    'g' =>  50,
                    'b'  =>  255,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  300,
                    'b'  =>  255,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  50,
                    'b'  =>  290,
                ]
            )
        );


    }

    public function testPasses( )
    {
        $this->assertTrue(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'green' =>  50,
                    'blue'  =>  255,
                ]
            )
        );

        $this->assertTrue(
            ( new \Lukaswhite\Rules\Color\Rgb( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  50,
                    'b'  =>  255,
                ]
            )
        );
    }
}