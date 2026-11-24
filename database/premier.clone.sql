CREATE DATABASE IF NOT EXISTS premier_clone;

USE premier_clone;

CREATE TABLE invoices (
    id INT PRIMARY KEY AUTO_INCREMENT,

    customer VARCHAR(100) NOT NULL,

    supplier_name VARCHAR(100) NOT NULL,

    registered_supplier VARCHAR(100),

    payment_number VARCHAR(50),

    invoice_no VARCHAR(100),

    invoice_date DATE,

    payment_date DATE,

    status VARCHAR(50),

    po_number VARCHAR(50),

    voucher_id VARCHAR(50),

    amount DECIMAL(10,2),

    cfo_invoice_type VARCHAR(50),

    vendor_number VARCHAR(50),

    facility VARCHAR(100),

    vendor_grouping VARCHAR(50),

    paid_amount DECIMAL(10,2),

    hospital_id VARCHAR(50),

    payment_method VARCHAR(50)
);


INSERT INTO invoices (
customer,
supplier_name,
registered_supplier,
payment_number,
invoice_no,
invoice_date,
payment_date,
status,
po_number,
voucher_id,
amount,
cfo_invoice_type,
vendor_number,
facility,
vendor_grouping,
paid_amount,
hospital_id,
payment_method
)

VALUES

(
'AdventHealth (Workday)',
'ABC Pharma',
'ABC Pharma',
'PAY1001',
'INV1001',
'2026-03-10',
'2026-03-24',
'Released',
'PO1001',
'V10001',
1440.00,
'Non CFO',
'BC8160',
'Main Hospital',
'Yes If Available',
1440.00,
'AH001',
'ACH'
),

(
'Baystate Health',
'MediCare Supplies',
'MediCare Supplies',
'PAY1002',
'INV1002',
'2026-03-12',
'2026-03-26',
'Released',
'PO1002',
'V10002',
2480.00,
'CFO',
'BC8161',
'Branch Hospital',
'Yes If Available',
2480.00,
'BH001',
'ACH'
),

(
'Mercy Health',
'Health Corp',
'Health Corp',
'PAY1003',
'INV1003',
'2026-03-18',
'2026-04-02',
'Pending',
'PO1003',
'V10003',
6320.00,
'Non CFO',
'BC8162',
'Satellite Center',
'No',
6320.00,
'MH001',
'ACH'
),

(
'AdventHealth (Workday)',
'Care Medical',
'Care Medical',
'PAY1004',
'INV1004',
'2026-03-22',
'2026-04-04',
'Released',
'PO1004',
'V10004',
5150.00,
'CFO',
'BC8163',
'Main Hospital',
'Yes If Available',
5150.00,
'AH001',
'ACH'
),

(
'Baystate Health',
'Global Healthcare',
'Global Healthcare',
'PAY1005',
'INV1005',
'2026-03-25',
'2026-04-07',
'Cancelled',
'PO1005',
'V10005',
3200.00,
'Non CFO',
'BC8164',
'Branch Hospital',
'No',
3200.00,
'BH001',
'ACH'
);


CREATE TABLE saved_searches (

    id INT PRIMARY KEY AUTO_INCREMENT,

    search_name VARCHAR(100),

    customer VARCHAR(100),

    registered_supplier VARCHAR(100),

    status VARCHAR(50),

    facility VARCHAR(100),

    cfo_invoice_type VARCHAR(50),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);