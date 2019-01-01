<?php


namespace Web;


use PHPUnit\Framework\TestCase;

class SlugTest extends TestCase
{
    public function testImplementsRuleContract( )
    {
        $rule = new \Lukaswhite\Rules\Web\Slug( );

        $this->assertInstanceOf(
            \Illuminate\Contracts\Validation\Rule::class,
            $rule
        );
    }

    public function testReturnsMessage( )
    {
        $this->assertTrue( is_string( ( new \Lukaswhite\Rules\Web\Slug( ) )->message( ) ) );
    }

    public function testFailsWhenValueIsNotString( )
    {
        $this->assertFalse( ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', 1 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', 1.5 ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', [ ] ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', false ) );
        $this->assertFalse( ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', new \stdClass( ) ) );
    }

    public function testFailsWhenValueContainsSpaces( )
    {
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', 'a slug cannot have spaces' )
        );
    }
    public function testFailsWhenValueContainsSpecialCharacters( )
    {
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', 'a slug cannot have #' )
        );
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', 'a slug cannot have ?' )
        );
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', 'a slug cannot have *' )
        );
        $this->assertFalse(
            ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', 'a slug cannot have _' )
        );
    }

    public function testPassesWhenSlugIsValid( )
    {
        $this->assertTrue(
            ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', 'this-is-a-slug' )
        );
        $this->assertTrue(
            ( new \Lukaswhite\Rules\Web\Slug( ) )->passes( 'value', 'this-is-a-slug-1234' )
        );
    }
}