<?php

namespace Acme\Application\Contract;

interface Application
{

    public static function create($basePath);

    public function run();

    public function bootstrap();

    public function basePath();

    public function bootPath();

    public function configPath();

    public function publicPath();
}
