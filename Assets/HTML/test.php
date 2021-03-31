<?php


if (isset($_COOKIE['shopping_cart'])) {
  $total = 0;
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  

  foreach ($cart_data as $kays => $values) {
      $total += ($values['item_price']*$values['item_quantity']); 
  }

}
require '../../vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51D9K3cC4WsdowLo8jnT4ZQg44UEUsBXAMQ8cKAdThufyTufGh7iLf4n5oF2jYLL45ihAN5oSlhfHMs9xhrvnXZ8p00Lg1TzP5Z');

$YOUR_DOMAIN = 'http://localhost:8888';

$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'eur',
        'unit_amount' => $total*100,
        'product_data' => [
          'name' => 'D&CODE',
          'images' => ["https://i.ibb.co/NnghFPy/Capture-d-e-cran-2021-03-31-a-13-53-28.png"],
        ],
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/success.html',
    'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
  ]);
  echo json_encode(['id' => $checkout_session->id]);
?>