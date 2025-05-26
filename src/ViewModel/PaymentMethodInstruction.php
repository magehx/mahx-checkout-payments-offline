<?php

declare(strict_types=1);

namespace MageHx\MahxCheckoutOffline\ViewModel;

use MageHx\MahxCheckout\Data\PaymentMethodData;
use MageHx\MahxCheckoutOffline\Model\Config;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class PaymentMethodInstruction implements ArgumentInterface
{
    public function __construct(
        private readonly Config $config,
    ) {
    }

    public function get(PaymentMethodData $paymentMethodData): string
    {
        return nl2br($this->config->getInstruction($paymentMethodData->code));
    }
}
