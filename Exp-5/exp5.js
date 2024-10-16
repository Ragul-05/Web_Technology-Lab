function validateForm() {
    const recipeName = document.getElementById('recipeName').value.trim();
    const ingredients = document.getElementById('ingredients').value.trim();
    const instructions = document.getElementById('instructions').value.trim();
    const cookingTime = document.getElementById('cookingTime').value.trim();
    const errorMessage = document.getElementById('error-message');

    // Clear previous error messages
    errorMessage.textContent = '';

    if (recipeName === '' || ingredients === '' || instructions === '' || cookingTime === '') {
        errorMessage.textContent = 'All fields are required.';
        return false;
    }

    if (cookingTime <= 0) {
        errorMessage.textContent = 'Cooking time must be a positive number.';
        return false;
    }

    // If everything is fine
    alert('Recipe submitted successfully!');
    return true; // Allow form submission
}
