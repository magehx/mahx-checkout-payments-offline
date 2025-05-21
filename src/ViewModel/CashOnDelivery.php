<?php

declare(strict_types=1);

namespace MageHx\MahxCheckoutOffline\ViewModel;

use MageHx\MahxCheckoutOffline\Model\Config;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class CashOnDelivery implements ArgumentInterface
{
    public function __construct(
        private readonly Config $config,
    ) {
    }

    public function getInstruction(): string
    {
        return nl2br($this->config->getInstruction('cashondelivery'));
    }
}
