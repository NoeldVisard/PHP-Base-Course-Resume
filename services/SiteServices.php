<?php

declare(strict_types=1);

namespace app\services;

class SiteServices
{
    public function isUserAuthorized(): bool
    {
        return (bool) $_COOKIE['PHP_AUTH_STATE'];
    }

}