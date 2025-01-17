<?php

/*
 * This file is part of the iban-validation library.
 *
 * (c) Jan Schädlich <mail@janschaedlich.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Iban\Validation\Tests;

use Iban\Validation\CountryInfo;
use Iban\Validation\Swift\Exception\UnsupportedCountryCodeException;
use PHPUnit\Framework\TestCase;

final class CountryInfoTest extends TestCase
{
    /**
     * @var CountryInfo
     */
    private $countryInfo;

    protected function setUp(): void
    {
        $this->countryInfo = new CountryInfo('DE');
    }

    public function testItShouldThrowUnsupportedCountryCodeException()
    {
        $this->expectException(UnsupportedCountryCodeException::class);
        new CountryInfo('ZZ');
    }

    public function testIbanCountryCreation()
    {
        $expectedData = $this->getData();

        $this->assertEquals($expectedData['DE']['country_name'], $this->countryInfo->getCountryName());
        $this->assertEquals($expectedData['DE']['iban_structure'], $this->countryInfo->getIbanStructureSwift());
        $this->assertEquals($expectedData['DE']['bban_structure'], $this->countryInfo->getBbanStructureSwift());
        $this->assertEquals($expectedData['DE']['iban_regex'], $this->countryInfo->getIbanRegex());
        $this->assertEquals($expectedData['DE']['bban_regex'], $this->countryInfo->getBbanRegex());
        $this->assertEquals($expectedData['DE']['iban_length'], $this->countryInfo->getIbanLength());
        $this->assertEquals($expectedData['DE']['bban_length'], $this->countryInfo->getBbanLength());
        $this->assertEquals($expectedData['DE']['iban_electronic_format_example'], $this->countryInfo->getIbanElectronicExample());
        $this->assertEquals($expectedData['DE']['iban_print_format_example'], $this->countryInfo->getIbanPrintExample());
    }

    /**
     * @return array
     */
    private function getData()
    {
        return include dirname(__DIR__, 1).'/Resource/iban_registry_202205r92.php';
    }
}
