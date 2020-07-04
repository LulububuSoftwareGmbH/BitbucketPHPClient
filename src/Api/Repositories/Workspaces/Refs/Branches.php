<?php

declare(strict_types=1);

/*
 * This file is part of Bitbucket API Client.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bitbucket\Api\Repositories\Workspaces\Refs;

/**
 * The branches api class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class Branches extends AbstractRefsApi
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
        $path = $this->buildBranchesPath();

        return $this->get($path, $params);
    }

    /**
     * @param array $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function create(array $params = [])
    {
        $path = $this->buildBranchesPath();

        return $this->post($path, $params);
    }

    /**
     * @param string $branch
     * @param array  $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function show(string $branch, array $params = [])
    {
        $path = $this->buildBranchesPath($branch);

        return $this->get($path, $params);
    }

    /**
     * @param string $branch
     * @param array  $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function remove(string $branch, array $params = [])
    {
        $path = $this->buildBranchesPath($branch);

        return $this->delete($path, $params);
    }

    /**
     * Build the branches path from the given parts.
     *
     * @param string ...$parts
     *
     * @return string
     */
    protected function buildBranchesPath(string ...$parts)
    {
        return static::buildPath('repositories', $this->workspace, $this->repo, 'refs', 'branches', ...$parts);
    }
}
