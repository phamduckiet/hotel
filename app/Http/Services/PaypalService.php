<?php

namespace App\Http\Services;

use App\Models\Booking;
use Exception;
use Illuminate\Support\Facades\Log;
use Omnipay\Omnipay;

class PaypalService
{
    private $gateway; // Cổng thanh toán

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); // Môi trường test
    }

    /**
     * @param Booking $booking
     * @return \Omnipay\Common\Message\ResponseInterface|void
     */
    public function requestPayment(Booking $booking)
    {
        // Redirect người dùng đến trang thanh toán của Paypal
        try {
            $response = $this->gateway->purchase(array(
                'amount' => round($booking->money_total * 0.000041, 2), // Số lượng tiền thanh toán -> USD
                'currency' => 'USD',
                'returnUrl' => url('payment-success'), // Khi nguoi dùng nhấn đồng ý thanh toán, redirect về trang nao
                'cancelUrl' => url('payment-error'), // Khi nguoi dung nhan cancel thi redirect ve trang nao
                'metadata' => array(
                    'orderId' => $booking->id, // Id cua đơn dạt phong
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
        // Duoc goi sau khi nguoi dung dong thanh toan
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
