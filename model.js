document.addEventListener('DOMContentLoaded', function() {
    var loginRequiredLinks = document.querySelectorAll('.recipe-link');

    loginRequiredLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            if (!isLoggedIn) {  // Use the passed login status variable
                event.preventDefault(); // Prevent the default action of the link
                // Redirect to sign-up page with message
                window.location.href = 'Sign_up.php?message=Please%20sign%20up%20to%20access%20the%20featured%20recipes.';
            }
        });
    });
});
