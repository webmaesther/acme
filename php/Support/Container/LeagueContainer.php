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
    }

    /**
     * Add a definition to the container.
     *
     * @param string $alias
     * @param mixed $concrete
     * @param boolean $singleton
     * @return Container
     */
    public function add($alias, $concrete = null, $singleton = false)
    {
        $this->container->add($alias, $concrete, $singleton);
        return $this;
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
     * @param  callable $callback
     * @return Container
     */
    public function inflector($type, callable $callback = null)
    {
        $this->container->inflector($type, $callback);
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
     * Check if an item is registered in the container.
     *
     * @param  string $alias
     * @return boolean
     */
    public function exists($alias)
    {
        return $this->container->isRegistered($alias);
    }
}