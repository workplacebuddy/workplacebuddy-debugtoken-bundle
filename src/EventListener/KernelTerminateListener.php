<?php

namespace WorkplaceBuddy\DebugToken\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Event\TerminateEvent;

class KernelTerminateListener
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly string $serverHost
    )
    {
    }

    public function onKernelTerminate(TerminateEvent $event): void
    {
        if (!$event->isMainRequest()) {
            // don't do anything if it's not the main request
            return;
        }

        $response = $event->getResponse();
        $token = $response->headers->get('x-debug-token');

        $this->logger->debug("[Profiler] https://{$this->serverHost}/_profiler/$token");
    }
}