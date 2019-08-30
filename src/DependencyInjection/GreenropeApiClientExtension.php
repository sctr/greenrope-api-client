<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\DependencyInjection;

use Sctr\Greenrope\Api\Client;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Elizabeta Petrevska <elizabeta.petrevska@devsy.com>
 *
 * GreenropeApiClientExtension Class
 */
class GreenropeApiClientExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $configs   An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $def = new Definition(Client::class);
        $container->setDefinition('Sctr\Greenrope\Api\Client', $def);
        $def->setArgument(0, $config);
    }
}
