<section class="search-card">

    <div class="search-card__header">
        Search Criteria
    </div>

    <div class="search-card__body">

        <form method="GET" id="searchForm">

            <div class="search-grid">

                <div class="field">
                    <label>Customer</label>

                    <select id="customer" name="customer">

                        <option value="">Select Customer</option>

                        <option value="AdventHealth (Workday)"
                            <?php if (($_GET['customer'] ?? '') == 'AdventHealth (Workday)') echo 'selected'; ?>>
                            AdventHealth (Workday)
                        </option>

                        <option value="Baystate Health"
                            <?php if (($_GET['customer'] ?? '') == 'Baystate Health') echo 'selected'; ?>>
                            Baystate Health
                        </option>

                        <option value="Mercy Health"
                            <?php if (($_GET['customer'] ?? '') == 'Mercy Health') echo 'selected'; ?>>
                            Mercy Health
                        </option>

                    </select>
                </div>

                <div class="field">
                    <label>Supplier Name</label>

                    <input
                        type="text"
                        name="supplier_name"
                        value="<?php echo $_GET['supplier_name'] ?? ''; ?>">
                </div>

                <div class="field">
                    <label>Payment Number</label>

                    <input
                        type="text"
                        name="payment_number"
                        value="<?php echo $_GET['payment_number'] ?? ''; ?>">
                </div>

                <div class="field">
                    <label>Registered Supplier</label>

                    <select id="registered-supplier" name="registered_supplier">

                        <option value="">Select Supplier</option>

                        <option value="ABC Pharma"
                            <?php if (($_GET['registered_supplier'] ?? '') == 'ABC Pharma') echo 'selected'; ?>>
                            ABC Pharma
                        </option>

                        <option value="MediCare Supplies"
                            <?php if (($_GET['registered_supplier'] ?? '') == 'MediCare Supplies') echo 'selected'; ?>>
                            MediCare Supplies
                        </option>

                        <option value="Health Corp"
                            <?php if (($_GET['registered_supplier'] ?? '') == 'Health Corp') echo 'selected'; ?>>
                            Health Corp
                        </option>

                    </select>
                </div>

                <div class="field">

                    <label>Invoice No.</label>

                    <div class="input-group">

                        <select name="invoice_operator">

                            <option value="equals">Equals</option>
                            <option value="contains">Contains</option>
                            <option value="starts_with">Starts With</option>
                            <option value="ends_with">Ends With</option>

                        </select>

                        <input
                            type="text"
                            name="invoice_no"
                            value="<?php echo $_GET['invoice_no'] ?? ''; ?>">

                    </div>

                </div>

                <div class="field">

                    <label>Apply Vendor Grouping</label>

                    <select id="vendor-grouping" name="vendor_grouping">

                        <option value="">Select</option>

                        <option value="Yes If Available">
                            Yes If Available
                        </option>

                        <option value="No">
                            No
                        </option>

                    </select>

                </div>

                <div class="field">

                    <label>Invoice Date</label>

                    <div class="range-group">

                        <input
                            type="date"
                            name="invoice_date_from"
                            value="<?php echo $_GET['invoice_date_from'] ?? ''; ?>">

                        <input
                            type="date"
                            name="invoice_date_to"
                            value="<?php echo $_GET['invoice_date_to'] ?? ''; ?>">

                    </div>

                </div>

                <div class="field">

                    <label>Payment Date</label>

                    <input
                        type="date"
                        name="payment_date"
                        value="<?php echo $_GET['payment_date'] ?? ''; ?>">

                </div>

                <div class="field">

                    <label>Status</label>

                    <select id="status" name="status">

                        <option value="">Select</option>

                        <option value="Released"
                            <?php if (($_GET['status'] ?? '') == 'Released') echo 'selected'; ?>>
                            Released
                        </option>

                        <option value="Pending"
                            <?php if (($_GET['status'] ?? '') == 'Pending') echo 'selected'; ?>>
                            Pending
                        </option>

                        <option value="Cancelled"
                            <?php if (($_GET['status'] ?? '') == 'Cancelled') echo 'selected'; ?>>
                            Cancelled
                        </option>

                    </select>

                </div>

                <div class="field">

                    <label>Vendor Number</label>

                    <input
                        type="text"
                        name="vendor_number"
                        value="<?php echo $_GET['vendor_number'] ?? ''; ?>">

                </div>

                <div class="field">

                    <label>PO Number</label>

                    <input
                        type="text"
                        name="po_number"
                        value="<?php echo $_GET['po_number'] ?? ''; ?>">

                </div>

                <div class="field">

                    <label>Facility</label>

                    <select id="facility" name="facility">

                        <option value="">Select</option>

                        <option value="Main Hospital"
                            <?php if (($_GET['facility'] ?? '') == 'Main Hospital') echo 'selected'; ?>>
                            Main Hospital
                        </option>

                        <option value="Branch Hospital"
                            <?php if (($_GET['facility'] ?? '') == 'Branch Hospital') echo 'selected'; ?>>
                            Branch Hospital
                        </option>

                        <option value="Satellite Center"
                            <?php if (($_GET['facility'] ?? '') == 'Satellite Center') echo 'selected'; ?>>
                            Satellite Center
                        </option>

                    </select>

                </div>

                <div class="field">

                    <label>Voucher ID</label>

                    <input
                        type="text"
                        name="voucher_id"
                        value="<?php echo $_GET['voucher_id'] ?? ''; ?>">

                </div>

                <div class="field">

                    <label>CFO Invoice Type</label>

                    <select id="cfo-type" name="cfo_invoice_type">

                        <option value="">All</option>

                        <option value="CFO"
                            <?php if (($_GET['cfo_invoice_type'] ?? '') == 'CFO') echo 'selected'; ?>>
                            CFO
                        </option>

                        <option value="Non CFO"
                            <?php if (($_GET['cfo_invoice_type'] ?? '') == 'Non CFO') echo 'selected'; ?>>
                            Non CFO
                        </option>

                    </select>

                </div>

                <div class="field">

                    <label>Amount</label>

                    <div class="range-group">

                        <input
                            type="number"
                            step="0.01"
                            name="amount_from"
                            placeholder="From"
                            value="<?php echo $_GET['amount_from'] ?? ''; ?>">

                        <input
                            type="number"
                            step="0.01"
                            name="amount_to"
                            placeholder="To"
                            value="<?php echo $_GET['amount_to'] ?? ''; ?>">

                    </div>

                </div>

            </div>

            <div class="search-actions">

                <input
                    type="text"
                    name="search_name"
                    placeholder="Enter Search Name"
                    style="
                        height: 42px;
                        padding: 0 12px;
                        border: 1px solid #ccc;
                        border-radius: 6px;
                        min-width: 220px;
                    ">

                <button
                    type="submit"
                    formaction="includes/save-search-handler.php"
                    formmethod="POST"
                    name="save_search"
                    class="btn-primary">

                    Save Search

                </button>

                <a href="index.php" class="btn-reset">
                    Reset
                </a>

                <button
                    type="submit"
                    class="btn-search">

                    Search

                </button>

            </div>

        </form>

    </div>

</section>

<div class="loader-overlay" id="loaderOverlay">

    <div class="loader-box">

        <div class="loader-spinner"></div>

        <p>Searching invoices...</p>

    </div>

</div>