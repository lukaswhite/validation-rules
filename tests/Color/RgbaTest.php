<?php


namespace Color;


use PHPUnit\Framework\TestCase;

class RgbaTest extends TestCase
{
    public function testImplementsRuleContract( )
    {
        $rule = new \Lukaswhite\Rules\Color\Rgba( );

        $this->assertInstanceOf(
            \Illuminate\Contracts\Validation\Rule::class,
            $rule
        );
    }

    public function testReturnsMessage( )
    {
        $this->assertTrue( is_string( ( new \Lukaswhite\Rules\Color\Rgba( ) )->message( ) ) );
    }

    public function testFailsWhenValueIsNotArray( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes( 'value', 'color' ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes( 'value', 1 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes( 'value', 1.5 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes( 'value', false ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes( 'value', new \stdClass( ) ) );
    }

    public function testFailsWhenWrongNumberOfArrayElements( )
    {
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'green' =>  50,
                    'blue'  =>  255,
                    'alpha' =>  1,
                    'foo'   =>  44,
                ]
            )
        );
    }

    public function testFailsWhenColorMissing( )
    {
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'blue'  =>  255,
                    'foo'   =>  1,
                    'alpha' =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g'  =>  255,
                    'a'   =>  1,
                    'd' => 23
                ]
            )
        );
    }

    public function testFailsWhenColorOutOfRange( )
    {
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'red'   =>  -1,
                    'green' =>  50,
                    'blue'  =>  255,
                    'alpha'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'green' =>  -20,
                    'blue'  =>  255,
                    'alpha'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'green' =>  50,
                    'blue'  =>  -40,
                    'alpha'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'red'   =>  256,
                    'green' =>  50,
                    'blue'  =>  255,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'red'   =>  -10,
                    'green' =>  300,
                    'blue'  =>  255,
                    'alpha'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'red'   =>  300,
                    'green' =>  50,
                    'blue'  =>  290,
                    'alpha'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'r'   =>  -1,
                    'g' =>  50,
                    'b'  =>  255,
                    'a'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  -20,
                    'b'  =>  255,
                    'a'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  50,
                    'b'  =>  -40,
                    'a'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'r'   =>  256,
                    'g' =>  50,
                    'b'  =>  255,
                    'a'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  300,
                    'b'  =>  255,
                    'a'  =>  0.5,
                ]
            )
        );

        $this->assertFalse(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  50,
                    'b'  =>  290,
                    'a'  =>  0.5,
                ]
            )
        );


    }

    public function testPasses( )
    {
        $this->assertTrue(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'red'   =>  10,
                    'green' =>  50,
                    'blue'  =>  255,
                    'alpha'  =>  0.5,
                ]
            )
        );

        $this->assertTrue(
            ( new \Lukaswhite\Rules\Color\Rgba( ) )->passes(
                'value',
                [
                    'r'   =>  10,
                    'g' =>  50,
                    'b'  =>  255,
                    'a'  =>  0.5,
                ]
            )
        );
    }
}