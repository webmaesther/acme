<?php

namespace Acme\Support\Container;

use League\Container\Container as LContainer;
use League\Container\ContainerInterface;

class LeagueContainer extends Container
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->container = new LContainer();
        $this->singleton('container', $this);
        $this->singleton(Container::class, $this);
    }

    /**
     * Add a definition to the container.
     *
     * @param string $alias
     * @param mixed $concrete
     * @return Container
     */
    public function add($alias, $concrete)
    {
        $this->container->add($alias, $concrete, false);
        return $this;
    }

    /**
     * Get an item from the container.
     *
     * @param  string $alias
     * @param  array $args
     * @return mixed
     */
    public function get($alias, array $args = [])
    {
        return $this->container->get($alias, $args);
    }

    /**
     * Add a singleton definition to the container.
     *
     * @param  string $alias
     * @param  mixed $concrete
     * @return Container
     */
    public function singleton($alias, $concrete = null)
    {
        $this->container->singleton($alias, $concrete);
        return $this;
    }

    /**
     * Allows for methods to be invoked on any object
     * that is resolved of the type provided.
     *
     * @param  string $type
     * @param \Closure $callback
     * @return Container
     */
    public function inflector($type, \Closure $callback)
    {
        $this->container->inflector($type, $callback);
        return $this;
    }

    /**
     * Invoke.
     *
     * @param  mixed $alias
     * @param  array $args
     * @return mixed
     */
    public function call($alias, array $args = [])
    {
        return $this->container->call($alias, $args);
    }

    /**
     * Registers a service provider to the container.
     *
     * @param  string $provider
     * @return Container
     */
    public function register($provider)
    {
        $this->container->addServiceProvider(new LeagueServiceProvider(new $provider));
    }
}
