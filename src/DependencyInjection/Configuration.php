<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $tree = new TreeBuilder();
        $root = $tree->root('greenrope_api_client');

        $root
            ->children()
                ->arrayNode('connection')
                    ->children()
                        ->scalarNode('api_url')->isRequired()->defaultValue('https://api.stgi.net/api-xml')->end()
                        ->scalarNode('email')->isRequired()->end()
                        ->scalarNode('password')->isRequired()->end()
                        ->integerNode('account_id')->isRequired()->end()
                    ->end()
                ->end()
                ->arrayNode('groups')
                    ->arrayPrototype()
                        ->children()
                            ->integerNode('id')->isRequired()->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $tree;
    }
}
