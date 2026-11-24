<?php

include 'db.php';

$sql = "SELECT * FROM invoices WHERE 1=1";

/* Customer */
if (!empty($_GET['customer'])) {
    $customer = mysqli_real_escape_string($conn, $_GET['customer']);
    $sql .= " AND customer='$customer'";
}

/* Supplier Name */
if (!empty($_GET['supplier_name'])) {
    $supplierName = mysqli_real_escape_string($conn, $_GET['supplier_name']);
    $sql .= " AND supplier_name LIKE '%$supplierName%'";
}

/* Payment Number */
if (!empty($_GET['payment_number'])) {
    $paymentNumber = mysqli_real_escape_string($conn, $_GET['payment_number']);
    $sql .= " AND payment_number LIKE '%$paymentNumber%'";
}

/* Registered Supplier */
if (!empty($_GET['registered_supplier'])) {
    $registeredSupplier = mysqli_real_escape_string($conn, $_GET['registered_supplier']);
    $sql .= " AND registered_supplier='$registeredSupplier'";
}

/* Invoice Number */
if (!empty($_GET['invoice_no'])) {

    $invoiceNo = mysqli_real_escape_string($conn, $_GET['invoice_no']);
    $operator = $_GET['invoice_operator'] ?? 'equals';

    switch ($operator) {

        case 'contains':
            $sql .= " AND invoice_no LIKE '%$invoiceNo%'";
            break;

        case 'starts_with':
            $sql .= " AND invoice_no LIKE '$invoiceNo%'";
            break;

        case 'ends_with':
            $sql .= " AND invoice_no LIKE '%$invoiceNo'";
            break;

        default:
            $sql .= " AND invoice_no='$invoiceNo'";
    }
}

/* Vendor Grouping */
if (!empty($_GET['vendor_grouping'])) {
    $vendorGrouping = mysqli_real_escape_string($conn, $_GET['vendor_grouping']);
    $sql .= " AND vendor_grouping='$vendorGrouping'";
}

/* Invoice Dates */
if (!empty($_GET['invoice_date_from'])) {
    $invoiceFrom = mysqli_real_escape_string($conn, $_GET['invoice_date_from']);
    $sql .= " AND invoice_date >= '$invoiceFrom'";
}

if (!empty($_GET['invoice_date_to'])) {
    $invoiceTo = mysqli_real_escape_string($conn, $_GET['invoice_date_to']);
    $sql .= " AND invoice_date <= '$invoiceTo'";
}

/* Payment Date */
if (!empty($_GET['payment_date'])) {
    $paymentDate = mysqli_real_escape_string($conn, $_GET['payment_date']);
    $sql .= " AND payment_date='$paymentDate'";
}

/* Status */
if (!empty($_GET['status'])) {
    $status = mysqli_real_escape_string($conn, $_GET['status']);
    $sql .= " AND status='$status'";
}

/* Vendor Number */
if (!empty($_GET['vendor_number'])) {
    $vendorNumber = mysqli_real_escape_string($conn, $_GET['vendor_number']);
    $sql .= " AND vendor_number LIKE '%$vendorNumber%'";
}

/* PO Number */
if (!empty($_GET['po_number'])) {
    $poNumber = mysqli_real_escape_string($conn, $_GET['po_number']);
    $sql .= " AND po_number LIKE '%$poNumber%'";
}

/* Facility */
if (!empty($_GET['facility'])) {
    $facility = mysqli_real_escape_string($conn, $_GET['facility']);
    $sql .= " AND facility='$facility'";
}

/* Voucher ID */
if (!empty($_GET['voucher_id'])) {
    $voucherId = mysqli_real_escape_string($conn, $_GET['voucher_id']);
    $sql .= " AND voucher_id LIKE '%$voucherId%'";
}

/* CFO Type */
if (!empty($_GET['cfo_invoice_type'])) {
    $cfoType = mysqli_real_escape_string($conn, $_GET['cfo_invoice_type']);
    $sql .= " AND cfo_invoice_type='$cfoType'";
}

/* Amount */
if (!empty($_GET['amount_from'])) {
    $amountFrom = (float) $_GET['amount_from'];
    $sql .= " AND amount >= $amountFrom";
}

if (!empty($_GET['amount_to'])) {
    $amountTo = (float) $_GET['amount_to'];
    $sql .= " AND amount <= $amountTo";
}

$result = mysqli_query($conn, $sql);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=invoice-results.csv');

$output = fopen('php://output', 'w');

fputcsv($output, [
    'Amount',
    'Paid Amount',
    'Status',
    'Paid Date',
    'CFO Type',
    'Hospital ID',
    'Vendor No',
    'PO No',
    'Payment Method',
    'Voucher ID'
]);

while ($row = mysqli_fetch_assoc($result)) {

    fputcsv($output, [
        $row['amount'],
        $row['paid_amount'],
        $row['status'],
        $row['payment_date'],
        $row['cfo_invoice_type'],
        $row['hospital_id'],
        $row['vendor_number'],
        $row['po_number'],
        $row['payment_method'],
        $row['voucher_id']
    ]);
}

fclose($output);
exit;