<?php


$autoloader = dirname( __FILE__ ) . '/vendor/autoload.php';
if ( is_readable( $autoloader ) ) {
	require_once $autoloader;
}

use Automattic\WooCommerce\Client;

use Automattic\WooCommerce\HttpClient\HttpClientException;

$woocommerce = new Client(
    'https://thomsonline.in/thoms3/', 
    'consumer_secret', 
    'password',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
    ]
);


$products = $woocommerce->get('products');
//print_r($products);
?>
<table>
<?php
foreach($products as $product){ ?>
<tr>
<td><?php echo $product->name; ?></td>
<td>
<?php 
if(!empty($product->currencies)){
$value='';
foreach($product->currencies as $currency){
$value.=" ". $currency->type. ' : '. $currency->value.", "	;
}
echo trim($value,', ');
}
?>
</td>

</tr>	
	
<?php }
?>
</table>



