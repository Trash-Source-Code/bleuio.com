<?php
require_once('vendor/autoload.php');

$json = '{"publishableKey":"pk_live_51JQ6uKDPmbVVvaXBfDKJAHZQlFznTaWyRa4eTGxRtRiywz5WNAJK9QINtPjILQNjv5Tx0pvxY4ytgNSS3HaUNmoX00oaSJt0dy"}';
$stripeKey = json_decode($json, true);

\Stripe\Stripe::setApiKey("sk_test_your_secret_key");

$token = $_POST['stripeToken'];
$amount = $_POST['amount'];

try {
    $charge = \Stripe\Charge::create(array(
        "amount" => $amount,
        "currency" => "usd",
        "source" => $token,
    ));

    echo 'Charge successful! Charge ID: '.$charge->id;

} catch (\Stripe\Error\Card $e) {
    echo 'Card error: ' . $e->getMessage();
}
?>

<form action="your_server_side_script.php" method="post">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripeKey["publishableKey"]; ?>"
    data-amount="999"
    data-name="Your Product"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form>
<?php
$json = '{"publishableKey":"pk_live_51JQ6uKDPmbVVvaXBfDKJAHZQlFznTaWyRa4eTGxRtRiywz5WNAJK9QINtPjILQNjv5Tx0pvxY4ytgNSS3HaUNmoX00oaSJt0dy"}';
$stripeKey = json_decode($json, true);
?>

<form action="your_server_side_script.php" method="post">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripeKey["publishableKey"]; ?>"
    data-amount="999"
    data-name="Your Product"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form>
