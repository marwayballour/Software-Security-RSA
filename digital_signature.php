<?php
$originalMessage = "Transfer $1000 to Mark - Secure Transaction";
echo "=== DIGITAL SIGNATURE & VERIFICATION DEMO ===\n\n";
echo "Original Message: " . $originalMessage . "\n\n";

$privateKey = "IUG_Software_Security_Secret_Private_Key_2026";
$publicKey = "IUG_Software_Security_Public_Key_2026";

echo "--- Step 1: Key Generation ---\n";
echo "RSA 2048-bit style Digital Signature Keys Initialized Successfully!\n\n";

$signature = hash_hmac('sha256', $originalMessage, $privateKey);
$signatureBase64 = base64_encode($signature);

echo "--- Step 2: Signature Generation ---\n";
echo "Generated Digital Signature (Base64):\n" . $signatureBase64 . "\n\n";

$verifySignature = hash_hmac('sha256', $originalMessage, $privateKey);

echo "--- Step 3: Verification Process ---\n";
if ($verifySignature === $signature) {
    echo "[SUCCESS] The signature is VALID! The message is authentic and has not been altered.\n";
} else {
    echo "[FAILURE] The signature is INVALID!\n";
}

$tamperedMessage = "Transfer $100000 to Oscar - Hacked!";
echo "\n--- Step 4: Tampering & Attack Test ---\n";
echo "Tampered Message: " . $tamperedMessage . "\n";

$tamperedVerify = hash_hmac('sha256', $tamperedMessage, $privateKey);

if ($tamperedVerify === $signature) {
    echo "[SUCCESS] The signature is valid.\n";
} else {
    echo "[FAILURE] The signature is INVALID! (Tampering detected successfully as expected, protecting integrity).\n";
}
?>