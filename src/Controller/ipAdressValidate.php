<?php

namespace Idrees\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */





class ipAdressValidate implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * Check if IP is valid or not.
     * GET ip
     *
     * @return string
     */

    public function getProtocol($ipAddress)
    {
        $test = "ip is invalid";
        if (filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                $test = "IPv4";
            }
            if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                $test = "IPv6";
            }
        }
        return $test;
    }

        /**
     * Check if IP is valid or not.
     * GET  domain
     *
     * @return string
     */
    public function getDomain($ipAddress)
    {
        if (filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            return gethostbyaddr($ipAddress);
        }
        return "Not valid";
    }
}
