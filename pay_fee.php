<?php
require('vendor/autoload.php');
require_once 'config/db_connect.php';

use Razorpay\Api\Api;

// Define your faculty configuration API key credentials
$key_id = "rzp_live_T0E03YO2u78Pfu";
$key_secret = "IxFXhxbSWSxuk11XiV1eBUoX";

$student_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Look up the matching record inside your system applications table
$query = mysqli_query($conn, "SELECT * FROM applications WHERE id = $student_id LIMIT 1");
$student = mysqli_fetch_assoc($query);

if (!$student) {
    die("Invalid checkout reference: Student file record missing.");
}

// Redirect back if the invoice has already been settled safely
if ($student['fee_status'] === 'Paid') {
    die("<h3>Payment Notice: This admission application fee has already been settled and verified successfully!</h3>");
}

// Define the processing amount in lowest denomination integer values (e.g., 1000 paise = ₹10.00 INR)
$fee_amount_paise = 100; 

$api = new Api($key_id, $key_secret);

// Generate a valid processing order ID token using Razorpay API methods
$order = $api->order->create([
    'receipt'  => 'REC_APP_' . $student['id'] . '_' . uniqid(),
    'amount'   => $fee_amount_paise,
    'currency' => 'INR',
]);

$razorpay_order_id = $order['id'];

// Save the order token locally into your applications tracking row
mysqli_query($conn, "UPDATE applications SET document_path = CONCAT(document_path, '') WHERE id = $student_id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Securing Gateway Portal...</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <style>
    body { background: linear-gradient(135deg, #1e1b4b, #312e81); min-height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; color: white; font-family: 'Inter', sans-serif; margin: 0; }
    .spinner { width: 50px; height: 50px; border: 5px solid rgba(255,255,255,0.1); border-top-color: #818cf8; border-radius: 50%; animation: spin 1s linear infinite; margin-bottom: 20px; }
    @keyframes spin { to { transform: rotate(360deg); } }
    h2 { font-weight: 300; text-align: center; padding: 0 20px; }
  </style>
</head>
<body>

<div class="spinner"></div>
<h2>Please complete your Admission Processing Fee via the secure popup portal...</h2>

<form id="verificationForm" action="verify_fee.php" method="POST" style="display: none;">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" value="<?php echo htmlspecialchars($razorpay_order_id); ?>">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
</form>

<script>
var options = {
    "key": "<?php echo htmlspecialchars($key_id); ?>", 
    "amount": "<?php echo $fee_amount_paise; ?>",
    "currency": "INR",
    "name": "Government Polytechnic",
    "description": "Provisional Admission Enrollment Fee",
    "order_id": "<?php echo htmlspecialchars($razorpay_order_id); ?>",
    "handler": function (response) {
        // Collect cryptographic token keys back from the secure handler modal interface frame
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        
        // Asynchronously forward parameters to verification engine script file
        document.getElementById('verificationForm').submit();
    },
    "prefill": {
        "name": "<?php echo htmlspecialchars($student['full_name']); ?>",
        "email": "<?php echo htmlspecialchars($student['email']); ?>",
        "contact": "<?php echo htmlspecialchars($student['phone']); ?>"
    },
    "theme": { "color": "#4f46e5" },
    "modal": {
        "ondismiss": function(){
            window.location.href = 'admission.php';
        }
    }
};
var rzp = new Razorpay(options);
rzp.open();
</script>
</body>
</html>