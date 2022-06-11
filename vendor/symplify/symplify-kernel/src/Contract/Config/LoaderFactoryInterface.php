<?php

declare (strict_types=1);
namespace RectorPrefix20220611\Symplify\SymplifyKernel\Contract\Config;

use RectorPrefix20220611\Symfony\Component\Config\Loader\LoaderInterface;
use RectorPrefix20220611\Symfony\Component\DependencyInjection\ContainerBuilder;
interface LoaderFactoryInterface
{
    public function create(ContainerBuilder $containerBuilder, string $currentWorkingDirectory) : LoaderInterface;
}
