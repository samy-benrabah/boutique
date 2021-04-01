<?php

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51D9K3cC4WsdowLo8jnT4ZQg44UEUsBXAMQ8cKAdThufyTufGh7iLf4n5oF2jYLL45ihAN5oSlhfHMs9xhrvnXZ8p00Lg1TzP5Z');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:4242';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => 2000,
      'product_data' => [
        'name' => 'Stubborn Attachments',
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

echo json_encode(['id' => $checkout_session->id]);