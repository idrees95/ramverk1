<?php

namespace Idrees\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class jsonAdressController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    private $ipAddress;
    private $object;


    public function indexAction() : object
    {
        $title = "Check IP with (JSON)";
        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $json = null;
        $this->ipAddress = $request->getGet("ip");
        $this->object = new ipAdressValidate();
        $json = $this->ConvertToJson($this->ipAddress, $this->object);
        $data['json'] = $json;
        $page->add("ipValidate/jsonFormat", $data);
        return $page->render([
            "title" => $title,
        ]);
    }


    public function ConvertToJson($ipAddress, $object) : array
    {
        $json = [
            "Ip" => $ipAddress,
            "Protocol" => $object->getProtocol($ipAddress) ?? null,
            "Domain" => $object->getDomain($ipAddress) ?? null,
        ];
        return [$json];
    }
}
