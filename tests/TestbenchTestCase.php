<?php

namespace Avexsoft\FilamentDonkey\Tests;

use Orchestra\Testbench\TestCase as Testbench;

abstract class TestbenchTestCase extends Testbench
{
    protected $enablesPackageDiscoveries = true;

    protected function getPackageProviders($app): array
    {
        return [
            TestPanelProvider::class,
        ];
    }
}
