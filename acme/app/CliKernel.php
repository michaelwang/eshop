<?php

require_once __DIR__.'/AppKernel.php';

use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * Sylius CLI application kernel.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class CliKernel extends AppKernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        $bundles = array(
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Sylius\Bundle\FixturesBundle\SyliusFixturesBundle(),
#            new Sylius\Bundle\ThemeBundle\SyliusThemeBundle(),
        );

        return array_merge(parent::registerBundles(), $bundles);
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        parent::registerContainerConfiguration($loader);

        $loader->load(__DIR__.'/config/migrations.yml');
    }
}
