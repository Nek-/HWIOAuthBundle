<?php

/*
 * This file is part of the HWIOAuthBundle package.
 *
 * (c) Hardware Info <opensource@hardware.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HWI\Bundle\OAuthBundle\Tests\OAuth\ResourceOwner;

use HWI\Bundle\OAuthBundle\OAuth\ResourceOwner\DisqusResourceOwner;

class DisqusResourceOwnerTest extends GenericOAuth2ResourceOwnerTest
{
    protected $resourceOwnerClass = DisqusResourceOwner::class;
    protected $userResponse = <<<json
{
    "response": {
        "id": "1",
        "username": "bar",
        "name": "foo"
    }
}
json;

    protected $paths = [
        'identifier' => 'response.id',
        'nickname' => 'response.username',
        'realname' => 'response.name',
    ];

    protected $expectedUrls = [
        'authorization_url' => 'http://user.auth/?test=2&response_type=code&client_id=clientid&scope=read&redirect_uri=http%3A%2F%2Fredirect.to%2F',
        'authorization_url_csrf' => 'http://user.auth/?test=2&response_type=code&client_id=clientid&scope=read&state=random&redirect_uri=http%3A%2F%2Fredirect.to%2F',
    ];
}
