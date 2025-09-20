<?php
	/* PHP Arrays - Shopping-cart exercise
	*/

	$user = [
		'name' => 'Anna',
		'email' => 'anna@example.com',
		'cart' => []
	];
	
	$products = [
		['id' => 1, 'name' => 'Laptop', 'price' => 1200],
		['id' => 2, 'name' => 'Mouse', 'price' => 25],
		['id' => 3, 'name' => 'Keyboard', 'price' => 60],
	];
	
	/* core functions */
	function addToCart(array &$user, array $product): void
	{
		$user['cart'][] = $product;
	}

	function removeFromCart(array &$user, int $productId): void
	{
		$user['cart'] = array_filter(
			$user['cart'],
			fn($item) => $item['id'] !== $productId
		);
	}
	
	function getCartTotal(array $user): int
	{
		return (int) array_sum(array_column($user['cart'], 'price'));
	}
	
	/* ---------- quick test ---------- */
	addToCart($user, $products[0]); // Laptop
	addToCart($user, $products[2]); // Keyboard
	removeFromCart($user, 2);       // try to remove Mouse (not present)
	
	echo "Total: $" . getCartTotal($user) . PHP_EOL;
	
	
	
	