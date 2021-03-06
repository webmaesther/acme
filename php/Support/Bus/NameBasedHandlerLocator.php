<?php

namespace Acme\Support\Bus;

use Acme\Support\Container\Container;
use League\Tactician\Exception\MissingHandlerException;
use League\Tactician\Handler\Locator\HandlerLocator;

class NameBasedHandlerLocator implements HandlerLocator
{
    use CommandTranslator;

    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Retrieves the handler for a specified command
     *
     * @param string $commandName
     *
     * @return object
     *
     * @throws MissingHandlerException
     */
    public function getHandlerForCommand($commandName)
    {
        $handlerName = $this->translate($commandName, 'Handler');

        return $this->container->get($handlerName);
    }
}
