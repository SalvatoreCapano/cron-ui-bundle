<?php

namespace SalvatoreCapano\CronUiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('cron_ui');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('route_path')
            ->defaultValue('/cron-jobs')
            ->info('Route path for Cron UI.')
            ->end()
            ->scalarNode('job_entity_class')
            ->defaultValue('Cron\\CronBundle\\Entity\\CronJob')
            ->info('Cron job entity class from CronBundle.')
            ->end()
            ->end();

        return $treeBuilder;
    }
}