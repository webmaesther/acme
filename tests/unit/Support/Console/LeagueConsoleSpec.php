<?php

namespace unit\Acme\Support\Console;

use Acme\Support\Console\Command;
use Acme\Support\Container\Container;
use League\CLImate\CLImate;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeagueConsoleSpec extends ObjectBehavior
{
    function let(Container $container, CLImate $climate)
    {
        $this->beConstructedWith($container, $climate);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Console\Console');
    }

    function it_adds_a_command(Container $container, Command $handler)
    {
        $command = 'command';
        $container->get(Command::class)->willReturn($handler);
        $this->command($command, Command::class);
        $this->handler($command)->shouldHaveType(Command::class);
    }
}
