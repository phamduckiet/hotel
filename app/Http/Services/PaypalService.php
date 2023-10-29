<?php

namespace App\Http\Services;

use App\Models\Booking;
use Exception;
use Illuminate\Support\Facades\Log;
use Omnipay\Omnipay;

class PaypalService
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    /**
     * @param Booking $booking
     * @return \Omnipay\Common\Message\ResponseInterface|void
     */
    public function requestPayment(Booking $booking)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => round($booking->money_total * 0.000041, 2),
                'currency' => 'USD',
                'returnUrl' => url('payment-success'),
                'cancelUrl' => url('payment-error'),
                'metadata' => array(
                    'orderId' => $booking->id,
                ),
            ))->send();

            Log::info('Request Paypal', ['response' => $response]);

            return $response;
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * @param string $paypalId
     * @param string $paymentId
     * @return \Omnipay\Common\Message\ResponseInterface|void
     */
    public function completePayment(string $paypalId, string $paymentId)
    {
        try {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $paypalId,
                'transactionReference' => $paymentId,
            ));

            return $transaction->send();
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
