<?php

namespace Netgen\Bundle\MoreDemoBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class NetgenMoreDemoExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function load( array $configs, ContainerBuilder $container )
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration( $configuration, $configs );

        $loader = new Loader\YamlFileLoader( $container, new FileLocator( __DIR__ . '/../Resources/config' ) );
        $loader->load( 'services.yml' );
    }

    /**
     * Allow an extension to prepend the extension configurations
     *
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function prepend( ContainerBuilder $container )
    {
        $configFiles = array(
            __DIR__ . '/../Resources/config/ezpublish.yml' => 'ezpublish',
            __DIR__ . '/../Resources/config/override.yml' => 'ezpublish',
            __DIR__ . '/../Resources/config/ezpage.yml' => 'ezpublish',
            __DIR__ . '/../Resources/config/ezpublish_legacy.yml' => 'ez_publish_legacy'
        );

        foreach ( $configFiles as $configFile => $configSection )
        {
            $config = Yaml::parse( file_get_contents( $configFile ) );
            $container->prependExtensionConfig( $configSection, $config );
            $container->addResource( new FileResource( $configFile ) );
        }
    }
}
