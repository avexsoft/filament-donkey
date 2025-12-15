<?php

namespace Avexsoft\FilamentDonkey;

use Avexsoft\FilamentEx\FilamentPluginBase;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentDonkeyPlugin // extends FilamentPluginBase
implements Plugin
{
    protected $pages = [];

    protected $resources = [];

    protected $clusters = [];

    protected ?string $navigationGroup = 'Config';

    public static function make(?string $filamentNavigationGroup = null): static
    {
        $class = get_called_class();

        return new $class;
    }

    public function getId(): string
    {
        return 'filament-donkey';
    }

    public function boot(Panel $panel): void {}

    public function register(Panel $panel): void
    {
        $namespacePrefix = substr(get_called_class(), 0, strrpos(get_called_class(), '\\'));
        $callerFilename = (new \ReflectionClass(get_called_class()))->getFileName();

        if ($this->pages == []) {
            $pagePath = dirname($callerFilename).'/Filament/Pages';
            $this->pages = array_filter([$namespacePrefix.'\\Filament\\Pages' => realpath($pagePath)]);
        }

        if ($this->resources == []) {
            $resourcePath = dirname($callerFilename).'/Filament/Resources';
            $this->resources = array_filter([$namespacePrefix.'\\Filament\\Resources' => realpath($resourcePath)]);
        }

        if ($this->clusters == []) {
            $clusterPath = dirname($callerFilename).'/Filament/Clusters';
            $this->clusters = array_filter([$namespacePrefix.'\\Filament\\Clusters' => realpath($clusterPath)]);
        }

        $this->registerPages($panel);
        $this->registerResources($panel);
        $this->registerClusters($panel);
    }

    /**
     * Get the resources specified in path
     *
     * @param [type] $in namespace
     * @param [type] $for path
     */
    public function discoverResources($in, $for): static
    {
        $this->resources[$in] = $for;

        return $this;
    }

    /**
     * Get the pages specified in path
     *
     * @param [type] $in namespace
     * @param [type] $for path
     */
    public function discoverPages($in, $for): static
    {
        $this->pages[$in] = $for;

        return $this;
    }

    /**
     * Get the clusters specified in path
     *
     * @param [type] $in namespace
     * @param [type] $for path
     */
    public function discoverClusters($in, $for): static
    {
        $this->clusters[$in] = $for;

        return $this;
    }

    private function registerPages($panel)
    {
        foreach ($this->pages as $namespace => $path) {
            $panel->discoverPages(
                for: $namespace,
                in: $path
            );
        }
    }

    private function registerResources($panel)
    {

        foreach ($this->resources as $namespace => $path) {
            $panel->discoverResources(
                for: $namespace,
                in: $path
            );
        }
    }

    private function registerClusters($panel)
    {

        foreach ($this->clusters as $namespace => $path) {
            $panel->discoverClusters(
                for: $namespace,
                in: $path
            );
        }
    }
}
