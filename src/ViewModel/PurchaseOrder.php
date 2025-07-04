<?php

declare(strict_types=1);

namespace MageHx\MahxCheckoutOffline\ViewModel;

use MageHx\MahxCheckout\Data\FormFieldConfig;
use MageHx\MahxCheckout\Enum\AdditionalFieldAttribute;
use MageHx\MahxCheckout\Enum\CheckoutForm;
use MageHx\MahxCheckout\Model\FieldRenderer\RendererPool;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class PurchaseOrder implements ArgumentInterface
{
    public function __construct(
        private readonly RendererPool $rendererPool,
    ) {
    }

    public function renderPONumberField(): string
    {
        $poNumberField = FormFieldConfig::from([
            'name' => 'additionalData[po_number]',
            'label' => 'Purchase Order Number',
            'type' => 'text',
            'required' => true,
            'form' => CheckoutForm::PAYMENT_METHODS->value,
            'value' => '',
            'id' => 'payment-purchase-order-po-number',
        ]);

        return $this->rendererPool->getRenderer($poNumberField)->render($poNumberField);
    }
}
