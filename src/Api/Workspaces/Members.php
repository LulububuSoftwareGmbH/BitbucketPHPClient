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

namespace Bitbucket\Api\Workspaces;

/**
 * The members api class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class Members extends AbstractWorkspacesApi
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
        $path = $this->buildMembersPath();

        return $this->get($path, $params);
    }

    /**
     * @param string $member
     * @param array  $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function show(string $member, array $params = [])
    {
        $path = $this->buildMembersPath($member);

        return $this->get($path, $params);
    }

    /**
     * Build the members path from the given parts.
     *
     * @param string ...$parts
     *
     * @return string
     */
    protected function buildMembersPath(string ...$parts)
    {
        return static::buildPath('workspaces', $this->workspace, 'members', ...$parts);
    }
}
