<?php

namespace Dulithaks\NumberToSinhalaWords\Tests;

use Dulithaks\NumberToSinhalaWords\SinhalaConverter;
use PHPUnit\Framework\TestCase;

class SinhalaConverterTest extends TestCase
{
    protected $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new SinhalaConverter();
    }

    /** @test */
    public function it_converts_zero_to_words()
    {
        $this->assertEquals('බිංදුව', $this->converter->toWords(0));
    }

    /** @test */
    public function it_converts_single_digits_to_words()
    {
        $this->assertEquals('එක', $this->converter->toWords(1));
        $this->assertEquals('දෙක', $this->converter->toWords(2));
        $this->assertEquals('තුන', $this->converter->toWords(3));
        $this->assertEquals('හතර', $this->converter->toWords(4));
        $this->assertEquals('පහ', $this->converter->toWords(5));
        $this->assertEquals('හය', $this->converter->toWords(6));
        $this->assertEquals('හත', $this->converter->toWords(7));
        $this->assertEquals('අට', $this->converter->toWords(8));
        $this->assertEquals('නවය', $this->converter->toWords(9));
    }

    /** @test */
    public function it_converts_ten_to_words()
    {
        $this->assertEquals('දහය', $this->converter->toWords(10));
    }

    /** @test */
    public function it_converts_teens_to_words()
    {
        $this->assertEquals('එකොළහ', $this->converter->toWords(11));
        $this->assertEquals('දොළහ', $this->converter->toWords(12));
        $this->assertEquals('තෙරළහ', $this->converter->toWords(13));
        $this->assertEquals('දාහතර', $this->converter->toWords(14));
        $this->assertEquals('පහළොව', $this->converter->toWords(15));
        $this->assertEquals('දාහය', $this->converter->toWords(16));
        $this->assertEquals('දාහත', $this->converter->toWords(17));
        $this->assertEquals('දහඅට', $this->converter->toWords(18));
        $this->assertEquals('දහනවය', $this->converter->toWords(19));
    }

    /** @test */
    public function it_converts_tens_to_words()
    {
        $this->assertEquals('විස්ස', $this->converter->toWords(20));
        $this->assertEquals('තිහ', $this->converter->toWords(30));
        $this->assertEquals('හතළිස්', $this->converter->toWords(40));
        $this->assertEquals('පනස', $this->converter->toWords(50));
        $this->assertEquals('හැට', $this->converter->toWords(60));
        $this->assertEquals('හැත්තෑව', $this->converter->toWords(70));
        $this->assertEquals('අසූව', $this->converter->toWords(80));
        $this->assertEquals('අනූව', $this->converter->toWords(90));
    }

    /** @test */
    public function it_converts_compound_numbers_to_words()
    {
        $this->assertEquals('විස්ස එක', $this->converter->toWords(21));
        $this->assertEquals('තිහ පහ', $this->converter->toWords(35));
        $this->assertEquals('අනූව නවය', $this->converter->toWords(99));
    }

    /** @test */
    public function it_converts_hundreds_to_words()
    {
        $this->assertEquals('එක සියය', $this->converter->toWords(100));
        $this->assertEquals('දෙක සියය', $this->converter->toWords(200));
        $this->assertEquals('එක සියය විස්ස තුන', $this->converter->toWords(123));
        $this->assertEquals('පහ සියය පනස පහ', $this->converter->toWords(555));
    }

    /** @test */
    public function it_converts_thousands_to_words()
    {
        $this->assertEquals('එක දහස', $this->converter->toWords(1000));
        $this->assertEquals('දෙක දහස', $this->converter->toWords(2000));
        $this->assertEquals('එක දහස දෙක සියය තිහ හතර', $this->converter->toWords(1234));
        $this->assertEquals('පහ දහස හය සියය හැත්තෑව අට', $this->converter->toWords(5678));
    }

    /** @test */
    public function it_converts_lakhs_to_words()
    {
        $this->assertEquals('එක ලක්ෂ', $this->converter->toWords(100000));
        $this->assertEquals('දෙක ලක්ෂ', $this->converter->toWords(200000));
        $this->assertEquals('එක ලක්ෂ විස්ස තුන දහස හතර සියය පනස හය', 
            $this->converter->toWords(123456));
    }

    /** @test */
    public function it_converts_crores_to_words()
    {
        $this->assertEquals('එක කෝටි', $this->converter->toWords(10000000));
        $this->assertEquals('දෙක කෝටි', $this->converter->toWords(20000000));
    }

    /** @test */
    public function it_converts_negative_numbers_to_words()
    {
        $this->assertEquals('ඍණ එක', $this->converter->toWords(-1));
        $this->assertEquals('ඍණ විස්ස පහ', $this->converter->toWords(-25));
        $this->assertEquals('ඍණ එක සියය', $this->converter->toWords(-100));
    }

    /** @test */
    public function it_converts_decimal_numbers_to_words()
    {
        $result = $this->converter->toWords(1.5);
        $this->assertStringContainsString('එක දශම', $result);
        
        $result = $this->converter->toWords(12.34);
        $this->assertStringContainsString('දොළහ දශම', $result);
    }

    /** @test */
    public function it_converts_currency_to_words()
    {
        $this->assertEquals('රු. එක', $this->converter->toCurrency(1));
        $this->assertEquals('රු. විස්ස පහ', $this->converter->toCurrency(25));
        $this->assertEquals('රු. එක සියය', $this->converter->toCurrency(100));
    }

    /** @test */
    public function it_converts_currency_with_cents_to_words()
    {
        $result = $this->converter->toCurrency(100.50);
        $this->assertStringContainsString('රු. එක සියය සහ සත', $result);
        
        $result = $this->converter->toCurrency(25.75);
        $this->assertStringContainsString('රු. විස්ස පහ සහ සත', $result);
    }

    /** @test */
    public function it_converts_zero_currency_to_words()
    {
        $this->assertEquals('රු. බිංදුව', $this->converter->toCurrency(0));
        
        $result = $this->converter->toCurrency(0.50);
        $this->assertStringContainsString('රු. බිංදුව සහ සත', $result);
    }

    /** @test */
    public function it_converts_negative_currency_to_words()
    {
        $this->assertEquals('ඍණ රු. එක', $this->converter->toCurrency(-1));
        $this->assertEquals('ඍණ රු. විස්ස පහ', $this->converter->toCurrency(-25));
    }

    /** @test */
    public function it_supports_custom_currency_symbol()
    {
        $this->assertEquals('$. විස්ස පහ', $this->converter->toCurrency(25, '$.'));
        $this->assertEquals('LKR. එක සියය', $this->converter->toCurrency(100, 'LKR.'));
    }
}
