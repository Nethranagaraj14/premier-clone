<!DOCTYPE html>
<html>

<head>
    <title>Premier Clone</title>

    <link rel="stylesheet" href="assets/scss/main.css">

    <link
        href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"
        rel="stylesheet">
</head>

<body>

    <?php include 'includes/header.php'; ?>

    <main class="page-content">

        <h1 class="page-title">VIEW INVOICES</h1>

        <?php include 'includes/saved-search.php'; ?>

        <?php include 'includes/search-criteria.php'; ?>

        <?php include 'includes/invoice-table.php'; ?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>