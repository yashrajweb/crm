<?php
// Include necessary libraries
require 'dbcon.php'; // Assuming dbcon.php handles your DB connection
require_once('./TCPDF-main/tcpdf.php'); // Include the TCPDF library

// Start output buffering to avoid issues with TCPDF
ob_start(); 

// Create new TCPDF object
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Company');
$pdf->SetAuthor('Your Company');
$pdf->SetTitle('Invoice');

// Add a page to the PDF
$pdf->AddPage();

// Initialize the HTML variable
$html = '';  // Always initialize the variable

// Check if POST data is available (assuming you are sending register_customer_id via POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_customer_id'])) {
    $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $desc = $_POST['description'];
    $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
    $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);




    $stmt = $con->prepare("INSERT INTO quotation_web (register_customer_id,title,description,mrp,offerprice) VALUES (?,?,?,?,?)");

    //fetch customer details


    $query = "SELECT * FROM register_customer WHERE register_customer_id='$register_customer_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $customer = mysqli_fetch_assoc($query_run);
    } else {
        echo "Customer not found!";
        exit;
    }




    $stmt->bind_param(
        "issii",
        $register_customer_id,
        $title,
        $desc,
        $mrp,
        $offer_price
    );




    if ($stmt->execute()) {
        $_SESSION['message'] = "Successfully Submitted!";
        // header("location: quotation-web.php");
        // exit();
    } else {
        $_SESSION['message'] = "Failed";
        // header("location: quotation-web.php");
        // exit();
    }

    $stmt->close();
    $con->close();




    //todo generate full template tomorrow the invoive is generated successfully........

    // Construct the HTML content for the invoice
    $html = '
    <h1 style="text-align: center;">Invoice</h1>
    <p><strong>Description: </strong>' . $desc . '</p>
    <ul>
        <li>Example Item</li>
    </ul>
    <table width="100%" style="border: 1px solid #000; border-collapse: collapse;">
        <tr>
            <td width="50%" style="padding: 5px;">
                <strong>Company Name:</strong><br>
                Webmirchi IT Solutions<br>
                Address: Prasad Apartment, Ground Floor, Near Bank of India, Erandwane, Pune<br>
                Phone: 9850639994<br>
                Email: info@webmirchi.com
            </td>
            <td width="50%" style="padding: 5px;">
                <strong>Customer:</strong><br>
                ' . $customer['first_name'] . ' ' . $customer['last_name'] . '<br>
                Address: ' . $customer['street'] . ', ' . $customer['area'] . ', ' . $customer['city'] . '<br>
                Phone: ' . $customer['mobile_number'] . '<br>
                Email: ' . $customer['email'] . '
            </td>
        </tr>
    </table>
    <br><br>
    <table width="100%" style="border: 1px solid #000; border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid #000; padding: 5px;">Item</th>
            <th style="border: 1px solid #000; padding: 5px;">Quantity</th>
            <th style="border: 1px solid #000; padding: 5px;">Unit Price</th>
            <th style="border: 1px solid #000; padding: 5px;">Total</th>
        </tr>
        <tr>
            <td style="border: 1px solid #000; padding: 5px;">Web Development</td>
            <td style="border: 1px solid #000; padding: 5px;">1</td>
            <td style="border: 1px solid #000; padding: 5px;">$1000</td>
            <td style="border: 1px solid #000; padding: 5px;">$1000</td>
        </tr>
        <tr>
            <td colspan="3" style="border: 1px solid #000; text-align: right; padding: 5px;">Subtotal</td>
            <td style="border: 1px solid #000; padding: 5px;">$1000</td>
        </tr>
        <tr>
            <td colspan="3" style="border: 1px solid #000; text-align: right; padding: 5px;">Tax (18%)</td>
            <td style="border: 1px solid #000; padding: 5px;">$180</td>
        </tr>
        <tr>
            <td colspan="3" style="border: 1px solid #000; text-align: right; padding: 5px;"><strong>Total</strong></td>
            <td style="border: 1px solid #000; padding: 5px;"><strong>$1180</strong></td>
        </tr>
    </table>
    <br><br>
    <p><strong>Terms and Conditions:</strong><br>Payment due within 30 days. Late payments may incur additional fees.</p>
';
}

// Output the HTML content as a PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF (force download)
$pdf->Output('invoice.pdf'); // 'D' will force the PDF to be downloaded

exit;
?>
