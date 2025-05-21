<?php

declare(strict_types=1);

namespace MageHx\MahxCheckoutOffline\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    public function getInstruction(string $payment): string
    {
        return $this->getStoreConfig("payment/{$payment}/instructions") ?? '';
    }

    public function getStoreConfig(string $path): mixed
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function isStoreSetFlag(string $path): bool
    {
        return $this->scopeConfig->isSetFlag($path, ScopeInterface::SCOPE_STORE);
    }
}
