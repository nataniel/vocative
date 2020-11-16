<?php
namespace NatanielTest;

use PHPUnit\Framework\TestCase;
use Nataniel\Vocative;

/**
 * Class VocativeTest
 * @covers  Vocative
 * @package NatanielTest
 */
class VocativeTest extends TestCase
{
    /**
     * @covers Vocative::invoke
     */
    public function testInvoke()
    {
        $vocative = new Vocative();
        $this->assertEquals('Kasiu', $vocative->invoke('Kasia'));
        $this->assertEquals('Arturze', $vocative->invoke('Artur'));
        $this->assertEquals('Basiu', $vocative->invoke('Basia'));
        $this->assertEquals('Elu', $vocative->invoke('Ela'));
        $this->assertEquals('Kornelio', $vocative->invoke('Kornelia'));
        $this->assertEquals('Kornelu', $vocative->invoke('Kornel'));
        $this->assertEquals('Mamo', $vocative->invoke('Mama'));
        $this->assertEquals('Teściu', $vocative->invoke('Teść'));
        $this->assertEquals('Mściwoju', $vocative->invoke('Mściwój Kowalski'));
    }
}