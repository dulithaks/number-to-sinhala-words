<?php

namespace Dulithaks\NumberToSinhalaWords\Tests;

use Dulithaks\NumberToSinhalaWords\SinhalaConverter;
use Dulithaks\NumberToSinhalaWords\Exceptions\NumberOutOfRangeException;
use PHPUnit\Framework\TestCase;

class RangeValidationTest extends TestCase
{
    private $converter;

    protected function setUp(): void
    {
        $this->converter = new SinhalaConverter();
    }

    public function test_it_throws_exception_for_zero()
    {
        $this->expectException(NumberOutOfRangeException::class);
        $this->expectExceptionMessage('Number must be between 1 and 9,999,999.');
        $this->converter->toWords(0);
    }

    public function test_it_throws_exception_for_numbers_above_9999999()
    {
        $this->expectException(NumberOutOfRangeException::class);
        $this->expectExceptionMessage('Number must be between 1 and 9,999,999.');
        $this->converter->toWords(10000000);
    }

    public function test_it_accepts_1()
    {
        $result = $this->converter->toWords(1);
        $this->assertEquals('එක', $result);
    }

    public function test_it_accepts_9999999()
    {
        $result = $this->converter->toWords(9999999);
        $this->assertIsString($result);
        $this->assertNotEmpty($result);
    }
}
