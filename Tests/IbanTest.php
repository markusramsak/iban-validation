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

use Iban\Validation\Iban;
use PHPUnit\Framework\TestCase;

class IbanTest extends TestCase
{
    public function testIbanCreation()
    {
        $iban = new Iban('DE45500502011241539870');

        $this->assertEquals('DE', $iban->getCountryCode());
        $this->assertEquals('45', $iban->getChecksum());
        $this->assertEquals('500502011241539870', $iban->getBban());

        $this->assertEquals('DE45500502011241539870', $iban->format(Iban::FORMAT_ELECTRONIC));
        $this->assertEquals('DE45 5005 0201 1241 5398 70', $iban->format(Iban::FORMAT_PRINT));
    }
}
