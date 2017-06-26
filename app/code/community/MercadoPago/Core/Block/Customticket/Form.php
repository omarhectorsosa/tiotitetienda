<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL).
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category       Payment Gateway
 * @package        MercadoPago
 * @author         Gabriel Matsuoka (gabriel.matsuoka@gmail.com)
 * @copyright      Copyright (c) MercadoPago [http://www.mercadopago.com]
 * @license        http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


class MercadoPago_Core_Block_Customticket_Form
    extends MercadoPago_Core_Block_AbstractForm
{
    protected function _construct()
    {
        parent::_construct();

        $this->setTemplate('mercadopago/custom_ticket/form.phtml');
    }

    public function getTicketsOptions()
    {
        $paymentMethods = Mage::getModel('mercadopago/core')->getPaymentMethods();
        $tickets = [];

        foreach ($paymentMethods['response'] as $pm) {
            if ($pm['payment_type_id'] == 'ticket' || $pm['payment_type_id'] == 'atm') {
                $tickets[] = $pm;
            }
        }

        return $tickets;
    }
}
