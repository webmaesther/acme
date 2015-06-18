<?php

namespace unit\Acme\Application\Http\Web\Controllers;

use Acme\Support\Config\Config;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PageControllerSpec extends ObjectBehavior
{
    function let(Config $config)
    {
        $this->beConstructedWith($config);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Application\Http\Web\Controllers\PageController');
    }
}
