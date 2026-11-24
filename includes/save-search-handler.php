<?php

include 'db.php';

if (isset($_POST['save_search'])) {

    $search_name = mysqli_real_escape_string(
        $conn,
        trim($_POST['search_name'])
    );

    $customer = mysqli_real_escape_string(
        $conn,
        $_POST['customer'] ?? ''
    );

    $supplier_name = mysqli_real_escape_string(
        $conn,
        $_POST['supplier_name'] ?? ''
    );

    $payment_number = mysqli_real_escape_string(
        $conn,
        $_POST['payment_number'] ?? ''
    );

    $registered_supplier = mysqli_real_escape_string(
        $conn,
        $_POST['registered_supplier'] ?? ''
    );

    $invoice_no = mysqli_real_escape_string(
        $conn,
        $_POST['invoice_no'] ?? ''
    );

    $invoice_operator = mysqli_real_escape_string(
        $conn,
        $_POST['invoice_operator'] ?? ''
    );

    $vendor_grouping = mysqli_real_escape_string(
        $conn,
        $_POST['vendor_grouping'] ?? ''
    );

    $invoice_date_from = mysqli_real_escape_string(
        $conn,
        $_POST['invoice_date_from'] ?? ''
    );

    $invoice_date_to = mysqli_real_escape_string(
        $conn,
        $_POST['invoice_date_to'] ?? ''
    );

    $payment_date = mysqli_real_escape_string(
        $conn,
        $_POST['payment_date'] ?? ''
    );

    $status = mysqli_real_escape_string(
        $conn,
        $_POST['status'] ?? ''
    );

    $vendor_number = mysqli_real_escape_string(
        $conn,
        $_POST['vendor_number'] ?? ''
    );

    $po_number = mysqli_real_escape_string(
        $conn,
        $_POST['po_number'] ?? ''
    );

    $facility = mysqli_real_escape_string(
        $conn,
        $_POST['facility'] ?? ''
    );

    $voucher_id = mysqli_real_escape_string(
        $conn,
        $_POST['voucher_id'] ?? ''
    );

    $cfo_invoice_type = mysqli_real_escape_string(
        $conn,
        $_POST['cfo_invoice_type'] ?? ''
    );

    $amount_from = mysqli_real_escape_string(
        $conn,
        $_POST['amount_from'] ?? ''
    );

    $amount_to = mysqli_real_escape_string(
        $conn,
        $_POST['amount_to'] ?? ''
    );

    $checkQuery = mysqli_query(
        $conn,
        "SELECT id
         FROM saved_searches
         WHERE search_name='$search_name'
         LIMIT 1"
    );

    if (mysqli_num_rows($checkQuery) > 0) {

        $row = mysqli_fetch_assoc($checkQuery);
        $id = $row['id'];

        $sql = "
            UPDATE saved_searches
            SET
                customer='$customer',
                supplier_name='$supplier_name',
                payment_number='$payment_number',
                registered_supplier='$registered_supplier',
                invoice_no='$invoice_no',
                invoice_operator='$invoice_operator',
                invoice_date_from='$invoice_date_from',
                invoice_date_to='$invoice_date_to',
                payment_date='$payment_date',
                status='$status',
                vendor_number='$vendor_number',
                po_number='$po_number',
                facility='$facility',
                voucher_id='$voucher_id',
                vendor_grouping='$vendor_grouping',
                cfo_invoice_type='$cfo_invoice_type',
                amount_from='$amount_from',
                amount_to='$amount_to'
            WHERE id='$id'
        ";

    } else {

        $sql = "
            INSERT INTO saved_searches
            (
                search_name,
                customer,
                supplier_name,
                payment_number,
                registered_supplier,
                invoice_no,
                invoice_operator,
                invoice_date_from,
                invoice_date_to,
                payment_date,
                status,
                vendor_number,
                po_number,
                facility,
                voucher_id,
                vendor_grouping,
                cfo_invoice_type,
                amount_from,
                amount_to
            )
            VALUES
            (
                '$search_name',
                '$customer',
                '$supplier_name',
                '$payment_number',
                '$registered_supplier',
                '$invoice_no',
                '$invoice_operator',
                '$invoice_date_from',
                '$invoice_date_to',
                '$payment_date',
                '$status',
                '$vendor_number',
                '$po_number',
                '$facility',
                '$voucher_id',
                '$vendor_grouping',
                '$cfo_invoice_type',
                '$amount_from',
                '$amount_to'
            )
        ";
    }

    mysqli_query($conn, $sql);

    header("Location: ../index.php");
    exit;
}