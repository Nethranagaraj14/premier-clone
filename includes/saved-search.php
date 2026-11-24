<?php

include 'includes/db.php';

$savedSearches = mysqli_query(
    $conn,
    "SELECT * FROM saved_searches ORDER BY id DESC"
);

?>

<section class="saved-search">

    <div class="saved-search__top">

        <div class="saved-search__selector">

            <button
                type="button"
                class="saved-search__label"
                id="savedSearchToggle">

                Saved Search List ▼

            </button>

            <div class="saved-search__dropdown">

                <div class="saved-search__dropdown-header">

                    <span>SAVED SEARCHES</span>

                    <a
                        href="includes/clear-all-searches.php"
                        class="saved-search__clear-all"
                        onclick="return confirm('Clear all saved searches?')">

                        CLEAR ALL

                    </a>

                </div>

                <?php while ($search = mysqli_fetch_assoc($savedSearches)): ?>

                    <div class="saved-search__item-row">

                        <a
                            class="saved-search__item"
                            href="index.php?customer=<?php echo urlencode($search['customer']); ?>&invoice_no=<?php echo urlencode($search['invoice_no']); ?>&amount_from=<?php echo urlencode($search['amount_from']); ?>&amount_to=<?php echo urlencode($search['amount_to']); ?>">

                            <?php echo htmlspecialchars($search['search_name']); ?>

                        </a>

                        <a
                            class="saved-search__delete"
                            href="includes/delete-search.php?id=<?php echo $search['id']; ?>"
                            onclick="return confirm('Delete this saved search?')">

                            &times;

                        </a>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </div>

    <div class="refined-by">

        <?php

        $chips = [];

        if (!empty($_GET['customer'])) {
            $chips['customer'] = $_GET['customer'];
        }

        if (!empty($_GET['status'])) {
            $chips['status'] = $_GET['status'];
        }

        if (!empty($_GET['facility'])) {
            $chips['facility'] = $_GET['facility'];
        }

        if (!empty($_GET['cfo_invoice_type'])) {
            $chips['cfo_invoice_type'] = $_GET['cfo_invoice_type'];
        }

        if (!empty($_GET['invoice_no'])) {
            $chips['invoice_no'] = $_GET['invoice_no'];
        }

        if (!empty($_GET['amount_from']) || !empty($_GET['amount_to'])) {

            $from = $_GET['amount_from'] ?? '';
            $to   = $_GET['amount_to'] ?? '';

            $chips['amount'] = trim($from . ' - ' . $to);
        }

        ?>

        <?php if (!empty($chips)): ?>

            <span class="refined-by__text">

                Refined by:

            </span>

            <?php foreach ($chips as $key => $value): ?>

                <?php

                $removeFilters = $_GET;

                if ($key === 'amount') {

                    unset($removeFilters['amount_from']);
                    unset($removeFilters['amount_to']);

                } else {

                    unset($removeFilters[$key]);

                }

                $url = 'index.php';

                if (!empty($removeFilters)) {
                    $url .= '?' . http_build_query($removeFilters);
                }

                ?>

                <a
                    class="chip"
                    href="<?php echo $url; ?>">

                    <?php echo htmlspecialchars($value); ?>
                    ✕

                </a>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</section>