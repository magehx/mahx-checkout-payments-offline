<?php

declare(strict_types=1);

namespace MageHx\MahxCheckoutOffline\Data;

use MageHx\MahxCheckout\Data\PaymentMethodData;

class PurchaseOrderData extends PaymentMethodData
{
    public function rules(): array
    {
        return [
            ...parent::rules(),
            'additionalData.po_number' => 'required',
        ];
    }

    public function aliases(): array
    {
        return [
            'additionalData.po_number' => __('purchase order number'),
        ];
    }
}
