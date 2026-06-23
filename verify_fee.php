<?php
require('vendor/autoload.php');
require_once 'config/db_connect.php';

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$key_id = "rzp_live_T0E03YO2u78Pfu";
$key_secret = "IxFXhxbSWSxuk11XiV1eBUoX";

$success = false;
$error = "Payment Verification System Failure";

$razorpay_payment_id = $_POST['razorpay_payment_id'] ?? '';
$razorpay_order_id   = $_POST['razorpay_order_id'] ?? '';
$razorpay_signature  = $_POST['razorpay_signature'] ?? '';
$student_id          = isset($_POST['student_id']) ? (int)$_POST['student_id'] : 0;

if (!empty($razorpay_payment_id) && !empty($razorpay_signature) && !empty($razorpay_order_id)) {
    $api = new Api($key_id, $key_secret);

    try {
        $attributes = array(
            'razorpay_order_id'   => $razorpay_order_id,
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature'  => $razorpay_signature
        );

        
        $api->utility->verifyPaymentSignature($attributes);
        $success = true;
    } catch(SignatureVerificationError $e) {
        $success = false;
        $error = 'Signature match failed: ' . $e->getMessage();
    }
} else {
    $error = 'Invalid transactional tracking parameters supplied.';
}


if ($success && $student_id > 0) {
    $update_sql = "UPDATE applications SET fee_status = 'Paid' WHERE id = $student_id";
    mysqli_query($conn, $update_sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Transaction Result State: <?php echo $success ? 'Approved' : 'Failed'; ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body { background: linear-gradient(135deg, #1e1b4b, #312e81); min-height: 100vh; display: flex; align-items: center; justify-content: center; color: white; font-family: 'Inter', sans-serif; margin: 0; text-align: center; }
    .glass-card { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 24px; padding: 50px 40px; width: 100%; max-width: 450px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); }
    .icon { font-size: 80px; margin-bottom: 20px; }
    .success-icon { color: #34d399; }
    .error-icon { color: #f87171; }
    h1 { font-size: 2rem; margin-bottom: 10px; font-weight: 600; }
    p { color: #cbd5e1; margin-bottom: 30px; line-height: 1.6; }
    .payment-id { background: rgba(0,0,0,0.3); padding: 10px; border-radius: 8px; font-family: monospace; color: #a5b4fc; word-break: break-all; margin-bottom: 30px; }
    .btn { display: inline-block; padding: 14px 30px; background: #4f46e5; color: white; text-decoration: none; border-radius: 12px; font-weight: 600; transition: all 0.3s ease; }
    .btn:hover { background: #4338ca; transform: translateY(-2px); }
  </style>
</head>
<body>

  <div class="glass-card">
    <?php if ($success): ?>
        <div class="icon success-icon">✓</div>
        <h1>Fees Accepted Successfully!</h1>
        <p>Your provisional enrollment checkout payment has been validated securely. Your seat has been reserved inside the GPP registration roster.</p>
        <div class="payment-id">Razorpay Payment ID: <?php echo htmlspecialchars($razorpay_payment_id); ?></div>
    <?php else: ?>
        <div class="icon error-icon">✕</div>
        <h1>Payment Settlement Interrupted</h1>
        <p>Verification engine failed to clear signatures: <?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    
    <a href="admission.php" class="btn">Return to Portal Home</a>
  </div>

</body>
</html>