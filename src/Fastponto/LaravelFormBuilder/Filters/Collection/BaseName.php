<?php

namespace Fastponto\LaravelFormBuilder\Filters\Collection;

use Fastponto\LaravelFormBuilder\Filters\FilterInterface;

/**
 * Class BaseName
 *
 * @package Fastponto\LaravelFormBuilder\Filters\Collection
 * @author  Djordje Stojiljkovic <djordjestojilljkovic@gmail.com>
 */
class BaseName implements FilterInterface
{
    /**
     * @param string $value
     * @param array $options
     *
     * @return string
     */
    public function filter($value, $options = [])
    {
        $value = (string) $value;
        return basename($value);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'BaseName';
    }
}