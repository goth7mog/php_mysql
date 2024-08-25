function addRedirectPopup() {
    var container = document.querySelector('#yourElementId'); // Replace with your element's ID or selector

    // Add custom HTML content
    container.innerHTML = `
<h4>Redirecting back to the form in <span id="countdownError">3</span> seconds...</h4>

<script>
    // Function to show an error message
    // function showError() {
    // 	alert("An error occurred. You will be redirected to the previous page.");
    // }

    // Function to redirect to the previous page after 3 seconds
    function redirectToPreviousPage() {
        let countdown = 3;
        const countdownElement = document.getElementById("countdownError");

        const interval = setInterval(function() {
            countdownElement.textContent = countdown;
            countdown--;

            if (countdown < 0) {
                clearInterval(interval);
                window.history.back();
            }
        }, 1000);
    }

    // // Call the functions
    // showError();
    redirectToPreviousPage();
</script>
`;
}