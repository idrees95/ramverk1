<?php
namespace Idrees\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ipTest extends TestCase
{
    protected $di;
    protected $controller;

    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        $di = $this->di;

        // Setup the controller
        $this->controller = new ipAdressValidate();
        $this->controller->setDI($this->di);
    }

    public function testIpValidate()
    {
        $testValue = new ipAdressValidate();
        $result1 = $this->controller->getProtocol("192.168.56.1");
        $result2 = $this->controller->getProtocol("fd18:500a:f09a:0:4850:2d52:c753:8955");
        $this->assertContains("IPv4", $result1);
        $this->assertContains("IPv6", $result2);


    }
}
