<?php

/*
 * This file is part of the iban-validation library.
 *
 * (c) Jan Schädlich <mail@janschaedlich.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Iban\Validation\Swift;

use Symfony\Component\Yaml\Yaml;

class RegistryLoader
{
    public function load(string $filename)
    {
        return Yaml::parse(file_get_contents($filename));
    }
}
