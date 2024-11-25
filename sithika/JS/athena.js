// navigation menu, toggle button, and close button
const navMenu = document.getElementById('nav-menu');
const navToggle = document.getElementById('nav-toggle');
const navClose = document.getElementById('nav-close');

if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu');
    });
}

if (navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu');
    });
}

// Modal message

document.addEventListener('DOMContentLoaded', function() {
    
    if (typeof displayMessage !== 'undefined' && displayMessage !== "") {
        showModal(displayMessage);
    }
});


function showModal(message) {
    var modal = document.getElementById("myModal");
    var messageContent = document.getElementById("modalMessage");

    
    messageContent.innerText = message;

    modal.style.display = "block";

    var closeModal = document.getElementsByClassName("close")[0];
    closeModal.onclick = function() {
        modal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
}

// explore button

function explore() {
    window.location.href = "../sithika/shop_product.php";
}   

//checkout page validations

function saveGrandTotal() {
    var grandTotal = document.getElementById("grandTotalAmount").textContent;
    grandTotal = grandTotal.replace(/[^\d.]/g, '');  
    localStorage.setItem("grandTotal", grandTotal);  
}

window.onload = function() {
    var grandTotal = localStorage.getItem("grandTotal");
    if (grandTotal) {
        document.getElementById("checkoutTotal").textContent = "LKR " + parseFloat(grandTotal).toFixed(2);
    } else {
        document.getElementById("checkoutTotal").textContent = "LKR 0.00";
    }
};


function validateForm() {

    var inputField = document.getElementById("num");

    if (inputField.value.length < inputField.maxLength) {
        alert("Telephone Number should be 10 Digits");
        return false;
    }

    var inputField = document.getElementById("cardnumber");
    
    if (inputField.value.length < inputField.maxLength) {
        alert("Card number needs to be 16 digits");
        return false;
       
    }

    var inputField = document.getElementById("CVV");

    if (inputField.value.length < inputField.maxLength) {
        alert("security code (CVV) must be 3 digits");
        return false;
    }

}
  