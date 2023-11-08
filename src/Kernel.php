<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function build(ContainerBuilder $container): void
    {
        $this->registerMapping($container);
    }

    private function registerMapping(ContainerBuilder $container): void
    {
        $finder = Finder::create();
        $finder
            ->in(__DIR__)
            ->name('Entity')
            ->directories()
        ;
        $namespaces = [];
        $directories = [];

        foreach ($finder as $dir) {
            $namespace = str_replace('/', '\\', sprintf('%s\%s', __NAMESPACE__, $dir->getRelativePathname()));
            $namespaces[] = $namespace;
            $directories[] = $dir->getPathname();
        }

        $container->addCompilerPass(DoctrineOrmMappingsPass::createAttributeMappingDriver(
            $namespaces,
            $directories,
        ));
    }
}