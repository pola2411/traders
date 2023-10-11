<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Square\SquareClient;
use Square\Checkout\CreateCheckoutRequest;


class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    public function index()
    {
    
        return view('payment.show');
    }

    public function processPayment(Request $request)
    {
        $amount = $request->input('amount');
        $description = $request->input('description');

        $client = new SquareClient([
            'accessToken' => env('SQUARE_ACCESS_TOKEN'),
            'environment' => env('SQUARE_ENVIRONMENT'),
        ]);

        $api = $client->getCheckoutApi();

        $body = new CreateCheckoutRequest([
            'idempotency_key' => uniqid(),
            'order' => [
                'line_items' => [
                    [
                        'quantity' => '1',
                        'base_price_money' => [
                            'amount' => $amount * 100, // Amount in cents
                            'currency' => 'USD',
                        ],
                        'name' => $description,
                    ],
                ],
            ],
        ]);

        try {
            $checkoutResponse = $api->createCheckout(env('SQUARE_LOCATION_ID'), $body);
            return redirect($checkoutResponse->getResult()->getCheckout()->getCheckoutPageUrl());
        } catch (\Exception $e) {
            return redirect()->route('payment-form')->with('error', 'Error al procesar el pago.');
        }
    }
    }
