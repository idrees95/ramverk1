<?php
namespace Idrees\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class jsonTest extends TestCase
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
        $this->controller = new jsonAdressController();
        $this->controller->setDI($this->di);
    }

    public function testIndexAction()
    {
        $result2 = $this->controller->indexAction();
        $this->assertInternalType("object", $result2);
    }
}
