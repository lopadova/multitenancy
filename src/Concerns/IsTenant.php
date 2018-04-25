<?php

namespace Ollieread\Multitenancy\Concerns;

use Ollieread\Multitenancy\Facades\Multitenancy;

/**
 * Tenant trait
 *
 * @package Ollieread\Multitenancy\Concerns
 */
trait IsTenant
{

    /**
     * Get the subdomain identifier column name.
     *
     * @return string
     */
    public function getSubdomainIdentifierName(): string
    {
        return 'slug';
    }

    /**
     * Get the subdomain identifier.
     *
     * @return string
     */
    public function getSubdomainIdentifier(): string
    {
        return $this->{$this->getSubdomainIdentifierName()};
    }

    /**
     * Get the domain identifier column name.
     *
     * @return string
     */
    public function getDomainIdentifierName(): string
    {
        return 'domain';
    }

    /**
     * Get the domain identifier.
     *
     * @return string
     */
    public function getDomainIdentifier(): string
    {
        return $this->{$this->getDomainIdentifierName()};
    }

    /**
     * @return string
     */
    public function getDatabaseName(): string
    {
        return 'tenant_' . $this->getKey();
    }

    /**
     * Retrieve a route for the current tenant.
     *
     * @param       $name
     * @param array $parameters
     * @param bool  $absolute
     *
     * @return string
     */
    public function route($name, $parameters = [], $absolute = true)
    {
        return Multitenancy::route($name, $parameters, $absolute);
    }

    /**
     * Retrieve a URL for the current tenant.
     *
     * @param null  $path
     * @param array $parameters
     * @param null  $secure
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function url($path = null, $parameters = [], $secure = null)
    {
        return Multitenancy::url($path, $parameters, $secure);
    }
}