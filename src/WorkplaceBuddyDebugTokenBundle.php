<?php

namespace WorkplaceBuddy\DebugToken;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WorkplaceBuddy\DebugToken\Extension\DebugTokenExtension;

class WorkplaceBuddyDebugTokenBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new DebugTokenExtension();
    }
}