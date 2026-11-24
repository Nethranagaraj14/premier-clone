document.addEventListener("DOMContentLoaded", () => {

    new TomSelect("#customer", {
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });

    new TomSelect("#registered-supplier", {
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });

    new TomSelect("#vendor-grouping", {
        create: false
    });

    new TomSelect("#status", {
        create: false
    });

    new TomSelect("#facility", {
        create: false
    });

    new TomSelect("#cfo-type", {
        create: false
    });

    const form = document.getElementById("searchForm");
    const loader = document.getElementById("loaderOverlay");

    if (form) {

        form.addEventListener("submit", function () {

            loader.classList.add("active");

        });

    }

});

const savedSearchToggle =
    document.getElementById("savedSearchToggle");

const savedSearchDropdown =
    document.querySelector(".saved-search__dropdown");

if (savedSearchToggle && savedSearchDropdown) {

    savedSearchDropdown.style.display = "none";

    savedSearchToggle.addEventListener("click", function () {

        if (
            savedSearchDropdown.style.display === "none"
        ) {
            savedSearchDropdown.style.display = "block";
        } else {
            savedSearchDropdown.style.display = "none";
        }

    });

    document.addEventListener("click", function (event) {

        if (
            !savedSearchToggle.contains(event.target) &&
            !savedSearchDropdown.contains(event.target)
        ) {

            savedSearchDropdown.style.display = "none";

        }

    });

}