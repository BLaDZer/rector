<?php

declare (strict_types=1);
namespace Rector\Caching\Cache;

use RectorPrefix20210510\Nette\Caching\Cache;
use RectorPrefix20210510\Nette\Caching\Storages\FileStorage;
use Rector\Core\Configuration\Option;
use RectorPrefix20210510\Symplify\PackageBuilder\Parameter\ParameterProvider;
use RectorPrefix20210510\Symplify\SmartFileSystem\SmartFileSystem;
final class NetteCacheFactory
{
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    public function __construct(ParameterProvider $parameterProvider, SmartFileSystem $smartFileSystem)
    {
        $this->parameterProvider = $parameterProvider;
        $this->smartFileSystem = $smartFileSystem;
    }
    public function create() : Cache
    {
        $cacheDirectory = $this->parameterProvider->provideStringParameter(Option::CACHE_DIR);
        // ensure cache directory exists
        if (!$this->smartFileSystem->exists($cacheDirectory)) {
            $this->smartFileSystem->mkdir($cacheDirectory);
        }
        $fileStorage = new FileStorage($cacheDirectory);
        // namespace is unique per project
        return new Cache($fileStorage, \getcwd());
    }
}
