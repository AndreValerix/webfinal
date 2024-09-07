document.addEventListener('DOMContentLoaded', function () {
    const pages = document.querySelectorAll('.pic-content-box');
    const pageNumbers = document.querySelectorAll('.page-number');
    const prevArrow = document.getElementById('prev-arrow');
    const nextArrow = document.getElementById('next-arrow');

    let currentPage = 1;

    function showPage(page) {
        pages.forEach((pageBox) => {
            if (parseInt(pageBox.getAttribute('data-page')) === page) {
                pageBox.style.display = 'block';
            } else {
                pageBox.style.display = 'none';
            }
        });

        pageNumbers.forEach((pageNumber) => {
            if (parseInt(pageNumber.textContent) === page) {
                pageNumber.classList.add('active');
            } else {
                pageNumber.classList.remove('active');
            }
        });
    }

    pageNumbers.forEach((pageNumber) => {
        pageNumber.addEventListener('click', function () {
            currentPage = parseInt(this.textContent);
            showPage(currentPage);
        });
    });

    prevArrow.addEventListener('click', function () {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    nextArrow.addEventListener('click', function () {
        if (currentPage < pageNumbers.length) {
            currentPage++;
            showPage(currentPage);
        }
    });

    showPage(currentPage);
});
