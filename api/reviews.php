
<?php
require '../helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    out(['message' => 'Method not allowed'], 405);
}

// Only logged-in customers can submit reviews.
$user = need_role(['customer']);

$in = body();
$productId = (int) ($in['product_id'] ?? 0);
$rating = (int) ($in['rating'] ?? 0);
$comment = trim($in['comment'] ?? '');

// Validate input.
if ($productId <= 0) {
    out(['message' => 'Invalid product'], 400);
}

if ($rating < 1 || $rating > 5) {
    out(['message' => 'Rating must be between 1 and 5'], 400);
}

// Check whether the product exists and is active.
$st = $pdo->prepare(
    "SELECT id FROM products WHERE id = ? AND is_active = 1"
);
$st->execute([$productId]);

if (!$st->fetch()) {
    out(['message' => 'Product not found'], 404);
}

// Save the review.
$st = $pdo->prepare(
    "INSERT INTO reviews (product_id, user_id, rating, comment)
     VALUES (?, ?, ?, ?)"
);

$st->execute([
    $productId,
    $user['id'],
    $rating,
    $comment !== '' ? $comment : null
]);

out(['message' => 'Review submitted successfully'], 201);
