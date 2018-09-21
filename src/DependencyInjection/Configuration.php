<?php

/*
 * Copyright 2018 SCTR Services
 *
 * Distribution and reproduction are prohibited.
 *
 * @package     greenrope-api-client
 * @copyright   SCTR Services LLC 2018
 * @license     No License (Proprietary)
 */

namespace Sctr\Greenrope\Api\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $tree = new TreeBuilder();
        $root = $tree->root('greerope_api');

        $root
            ->children()
                ->scalarNode('api_url')->isRequired()->end()
                ->scalarNode('email')->isRequired()->end()
                ->scalarNode('password')->isRequired()->end()
            ->end();
    }
}
