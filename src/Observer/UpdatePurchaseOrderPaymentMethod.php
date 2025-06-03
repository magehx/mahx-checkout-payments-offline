<?php

declare(strict_types=1);

namespace MageHx\MahxCheckoutOffline\Observer;

use Magento\Framework\DataObject;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Quote\Api\Data\PaymentInterface;

/**
 * @event mahxcheckout_place_order_save_payment_before
 */
class UpdatePurchaseOrderPaymentMethod implements ObserverInterface
{
    private ?Observer $observer = null;

    public function execute(Observer $observer): void
    {
        $this->observer = $observer;

        if (!$this->isPurchaseOrderPayment()) {
            return;
        }

        $this->getPayment()->setPoNumber($this->getPurchaseOrderNumber());
    }

    private function getPurchaseOrderNumber(): ?string
    {
        $paymentInformation = $this->getTransport()->getData('payment_information');

        return $paymentInformation->paymentMethod->additionalData['po_number'] ?? null;
    }

    private function isPurchaseOrderPayment(): bool
    {
        return $this->getPayment()->getMethod() === 'purchaseorder';

    }

    private function getPayment(): PaymentInterface
    {
        return $this->getTransport()->getData('payment');
    }

    private function getTransport(): DataObject
    {
        return $this->observer->getData('transport');
    }
}
