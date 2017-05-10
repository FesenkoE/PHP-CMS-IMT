<?php 

require_once 'data/data_products.php';

$products = unserialize(preg_replace_callback('/(?<=^|\{|;)s:(\d+):\"(.*?)\";(?=[asbdiO]\:\d|N;|\}|$)/s',function($m) { 
return 's:' . strlen($m[2]) . ':"' . $m[2] . '";'; 
},$data_products));

// var_dump($products);

foreach ($products as $product) {
	
	if ($product->visible) {
		echo "<li>";
	echo "<a href=$product->url>$product->name</a>";	
			foreach ($product->variants as $variant) {			
				echo "<div>цена: $variant->price грн</div>" . "<br>";
				echo "<div class='sp'>на складе $variant->stock шт</div>";
			}
		
	} 
} echo "</li>";
?>

