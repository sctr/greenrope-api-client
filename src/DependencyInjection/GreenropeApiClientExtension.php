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

namespace Sctr\Bang\Api\DependencyInjection;

use Sctr\Greenrope\Api\Client;
use Sctr\Greenrope\Api\DependencyInjection\Configuration;
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
        $def->setArguments($config);

        $container->setDefinition('Sctr\Greenrope\Api\Client', $def);
    }
}
