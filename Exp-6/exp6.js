// Get references to form elements
const registrationForm = document.getElementById('registrationForm');
const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const usernameError = document.getElementById('usernameError');
const emailError = document.getElementById('emailError');
const passwordError = document.getElementById('passwordError');
const successMessage = document.getElementById('successMessage');

// Event listener for form submission
registrationForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Clear previous error messages
    usernameError.textContent = '';
    emailError.textContent = '';
    passwordError.textContent = '';
    successMessage.textContent = '';

    // Validate inputs
    let isValid = true;

    // Username validation
    if (usernameInput.value.trim() === '') {
        usernameError.textContent = 'Username is required.';
        isValid = false;
    }

    // Email validation
    if (emailInput.value.trim() === '') {
        emailError.textContent = 'Email is required.';
        isValid = false;
    } else if (!validateEmail(emailInput.value)) {
        emailError.textContent = 'Please enter a valid email.';
        isValid = false;
    }

    // Password validation
    if (passwordInput.value.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters.';
        isValid = false;
    }

    // If form is valid, show success message
    if (isValid) {
        successMessage.textContent = 'Registration successful!';
        // Optionally, you can reset the form
        registrationForm.reset();
    }
});

// Email validation function
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Event listener for keyboard events
usernameInput.addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        emailInput.focus(); // Move focus to the email input
    }
});

emailInput.addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        passwordInput.focus(); // Move focus to the password input
    }
});

passwordInput.addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        registrationForm.dispatchEvent(new Event('submit')); // Submit the form
    }
});

// Mouse event example (for button)
const registerButton = registrationForm.querySelector('button');
registerButton.addEventListener('mouseover', function() {
    registerButton.style.backgroundColor = '#4CAF50'; // Change color on hover
});
registerButton.addEventListener('mouseout', function() {
    registerButton.style.backgroundColor = ''; // Reset color
});
