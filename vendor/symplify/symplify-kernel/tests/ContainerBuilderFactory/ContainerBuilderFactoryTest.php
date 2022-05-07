<?php

declare (strict_types=1);
namespace RectorPrefix20220507\Symplify\SymplifyKernel\Tests\ContainerBuilderFactory;

use RectorPrefix20220507\PHPUnit\Framework\TestCase;
use RectorPrefix20220507\Symplify\SmartFileSystem\SmartFileSystem;
use RectorPrefix20220507\Symplify\SymplifyKernel\Config\Loader\ParameterMergingLoaderFactory;
use RectorPrefix20220507\Symplify\SymplifyKernel\ContainerBuilderFactory;
final class ContainerBuilderFactoryTest extends \RectorPrefix20220507\PHPUnit\Framework\TestCase
{
    public function test() : void
    {
        $containerBuilderFactory = new \RectorPrefix20220507\Symplify\SymplifyKernel\ContainerBuilderFactory(new \RectorPrefix20220507\Symplify\SymplifyKernel\Config\Loader\ParameterMergingLoaderFactory());
        $containerBuilder = $containerBuilderFactory->create([__DIR__ . '/config/some_services.php'], [], []);
        $hasSmartFileSystemService = $containerBuilder->has(\RectorPrefix20220507\Symplify\SmartFileSystem\SmartFileSystem::class);
        $this->assertTrue($hasSmartFileSystemService);
    }
}
