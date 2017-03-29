<?php

use League\Container\Container as LeagueContainer;

class Container
{
    /* @var LeagueContainer $instance */
    public static $instance;

    /**
     * @return LeagueContainer
     */
    public static function object(): LeagueContainer
    {
        if (!self::$instance) {
            self::$instance = new LeagueContainer;
        }

        return self::$instance;
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public static function get(string $name)
    {
        if (!self::$instance) {
            self::$instance = new LeagueContainer;
        }

        try {
            $object = self::$instance->get($name);
        } catch (Exception $exception) {
            $object = false;
        }

        return $object;
    }

    /**
     * @param string $name
     * @param        $object
     * @return bool
     */
    public static function set(string $name, $object): bool
    {
        if (!self::$instance) {
            self::$instance = new LeagueContainer;
        }

        self::$instance->add($name, $object);

        return true;
    }

}