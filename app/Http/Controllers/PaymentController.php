<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        Log::info($request->all());
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        if (!$request->has('stripeToken')) {
            Session::flash('success', 'Payment processing failed. Please try again.');
            return redirect()->back()->withErrors(['message' => 'Payment processing failed. Please try again.']);
        }

        try {

            \Stripe\Charge::create([
                'amount' => 2000,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment Description update',
            ]);

            // return redirect()->route('payment.success');
        } catch (\Stripe\Exception\CardException $e) {
            return redirect()->back()->withErrors(['message' => 'Payment failed. Please try again.']);
        }
    }


    public function handleWebhook(Request $request)
    {
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );

            Log::info("Handling webhook with type: {$event->type}");

            switch ($event->type) {
                case 'charge.succeeded':
                    $paymentIntent = $event->data->object;
                    Log::info($paymentIntent);
                    return redirect()->route('payment.success');
                case 'charge.failed':
                    return redirect()->route('payment.failed');
                default:
                    return response()->json(['status' => 'unknown event type']);
            }
        } catch (\UnexpectedValueException $e) {
            return response()->json(['status' => 'invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['status' => 'invalid signature'], 400);
        }
    }
}
