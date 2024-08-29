document.addEventListener("DOMContentLoaded", function() {
    const grid = document.querySelector(".pic-content-grid");
    const boxes = grid.querySelectorAll(".pic-content-box");
    const prevArrow = document.getElementById("prev-arrow");
    const nextArrow = document.getElementById("next-arrow");
    const pageNumbers = document.querySelectorAll(".page-number");

    let currentPage = 1;
    const totalPages = 3;

    function showPage(page) {
        boxes.forEach(box => {
            if (parseInt(box.getAttribute("data-page")) === page) {
                box.classList.remove("hidden");
            } else {
                box.classList.add("hidden");
            }
        });
        setActivePageNumber(page);
    }

    function updatePagination() {
        if (currentPage === 1) {
            prevArrow.style.visibility = "hidden";
        } else {
            prevArrow.style.visibility = "visible";
        }

        if (currentPage === totalPages) {
            nextArrow.style.visibility = "hidden";
        } else {
            nextArrow.style.visibility = "visible";
        }
    }

    function setActivePageNumber(page) {
        pageNumbers.forEach(pageNumber => {
            if (parseInt(pageNumber.id.split('-')[1]) === page) {
                pageNumber.classList.add("active");
            } else {
                pageNumber.classList.remove("active");
            }
        });
    }

    prevArrow.addEventListener("click", function() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
            updatePagination();
        }
    });

    nextArrow.addEventListener("click", function() {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
            updatePagination();
        }
    });

    // Initialize
    showPage(currentPage);
    updatePagination();
});
