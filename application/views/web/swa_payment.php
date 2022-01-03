<?php
define('MERCHANT_KEY', 'yz7bFXCz');
define('SALT', '0Az454fS2Y');
define('PAYU_BASE_URL', 'https://secure.payu.in');    //Testing url Use in development mode
define('SUCCESS_URL', 'https://www.swadarshana.com/web/swashoppe/paymentReaponse');  //order sucess url replace with your complete url
define('FAIL_URL', 'https://www.swadarshana.com/web/swashoppe/paymentReaponse');    //add complete url 

$amount = $this->cart->total()?$this->cart->total():'';
$totalamount = $amount?$amount*5/100:'';

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$email = $_SESSION['email'];
$mobile = '0000000000';
$firstName = $_SESSION['fullname'];
$user_id = $_SESSION['id'];
$totalCost = $totalamount?$amount + $totalamount:'0';
$hash         = '';
$hash_string = MERCHANT_KEY."|".$txnid."|".$totalCost."|"."productinfo|".$firstName."|".$email."|||||||||||".SALT;
$hash = strtolower(hash('sha512', $hash_string));
$action = PAYU_BASE_URL . '/_payment'; 

?>
<div class="hero-section hero-background">
  <h1 class="page-title"><?php echo $page_title; ?></h1>
</div>
<div class="container" style="width: 50%;">
	<div class="row">
	<form method="post" class="form-horizontal" action="<?php echo $action; ?>" id="payuForm" name="payuForm">
	<input type="hidden" name="key" value="<?php echo MERCHANT_KEY ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <input type="hidden" name="amount" id="amount" value="<?php echo $totalCost ?>" />
    <input type="hidden" name="firstname" id="firstname" value="<?php echo $firstName; ?>" />
    <input type="hidden"  name="email" id="email" value="<?php echo $email; ?>" />
    <input type="hidden" name="phone" value="<?php echo $mobile; ?>" />
    <textarea hidden name="productinfo"><?php echo "productinfo"; ?></textarea>
    <input type="hidden" name="surl" value="<?php echo SUCCESS_URL; ?>" />
    <input type="hidden" name="furl" value="<?php echo  FAIL_URL?>"/>
    <input type="hidden" name="service_provider" value="payu_paisa"/>
    <input type="hidden" name="field1" value="<?php echo $user_id;?>"/>
	</form>
	</div>
</div>
<script type="text/javascript">

</script>