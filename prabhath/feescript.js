// script.js
function showMessage() {
    // Check if the URL contains the success message
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('message') && urlParams.get('message') === 'success') {
        alert('Successfully submitted!');
    }
}

// Call showMessage when the page loads
window.onload = showMessage;
