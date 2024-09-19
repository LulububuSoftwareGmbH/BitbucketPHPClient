<?php

declare(strict_types=1);

/*
 * This file is part of the Bitbucket API Client.
 *
 * (c) Graham Campbell <hello@gjcampbell.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bitbucket\Api\Repositories\Workspaces;

use Bitbucket\HttpClient\Util\UriBuilder;

/**
 * The branch restrictions API class.
 *
 * @author Graham Campbell <hello@gjcampbell.co.uk>
 */
class UserPermissions extends AbstractWorkspacesApi
{
    /**
     * @param array $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function list(array $params = [])
    {
        $uri = $this->buildUsersUri();

        return $this->get($uri, $params);
    }

    /**
     * @param string $commit
     * @param array  $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function show(string $group, array $params = [])
    {
        $uri = $this->buildUsersUri($group);

        return $this->get($uri, $params);
    }

    /**
     * @param string $group
     * @param array  $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function create(string $group, array $params = [])
    {
        $uri = $this->buildUsersUri($group);

        return $this->put($uri, $params);
    }

    /**
     * @param string $group
     * @param array  $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function update(string $group, array $params = [])
    {
        $uri = $this->buildUsersUri($group);

        return $this->put($uri, $params);
    }

    /**
     * @param string $group
     * @param array  $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function remove(string $group, array $params = [])
    {
        $uri = $this->buildHooksUri($group);

        return $this->delete($uri, $params);
    }

    /**
     * Build the groups URI from the given parts.
     *
     * @param string ...$parts
     *
     * @return string
     */
    public function buildUsersUri(string ...$parts): string
    {
        return UriBuilder::build('repositories', $this->workspace, $this->repo, 'permissions-config/users', ...$parts);
    }
}
