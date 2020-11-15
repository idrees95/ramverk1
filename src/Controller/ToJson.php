<?php

namespace Idrees\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ToJson implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexActionGet():object
    {
        $request = $this->di->get("request");
        $GetRequest = $request->getGet("ip");
        $i = $request->getGet("ip");
        $valid = "Ogiltig IP";
        $host = "Domian hittades inte";

        if (filter_var($GetRequest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $valid = "IPV6";
            $host = gethostbyaddr($GetRequest);
        } elseif (filter_var($GetRequest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $valid = "IPV4";
            $host = gethostbyaddr($GetRequest);
        }

        $json = [
            "ip" => $GetRequest,
            "format" => $valid,
            "domain" => $host,
        ];

        return [$json];
    }

    public function indexActionPost()
    {
        $request = $this->di->get("request");

        $GetRequest = $request->getPost("ip");
        $valid = "Ogiltig IP";
        $host = "Domian hittades inte";

        if (filter_var($GetRequest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $valid = "IPV6";
            $host = gethostbyaddr($GetRequest);
        } elseif (filter_var($GetRequest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $valid = "IPV4";
            $host = gethostbyaddr($GetRequest);
        }

        $json = [
            "ip" => $GetRequest,
            "format" => $valid,
            "domain" => $host,
        ];

        $arr = array('IP' => $GetRequest, 'Format' => $valid, 'Domain' => $host);
        echo "\r\n".json_encode($arr, JSON_PRETTY_PRINT);

        return [$json];
    }
}
