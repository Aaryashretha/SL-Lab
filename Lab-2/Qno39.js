function validateForm() {
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll(".error").forEach(error => error.textContent = "");

    // Name Validation
    const name = document.getElementById("name").value.trim();
    if (!name || /\d/.test(name)) {
        document.getElementById("nameError").textContent = "Name must not be empty or contain numbers.";
        isValid = false;
    }

    // Address Validation
    const address = document.getElementById("address").value.trim();
    if (!address) {
        document.getElementById("addressError").textContent = "Address must not be empty.";
        isValid = false;
    }

    // Username Validation
    const username = document.getElementById("username").value.trim();
    if (!username || /[^a-zA-Z0-9_]/.test(username)) {
        document.getElementById("usernameError").textContent = "Username must not contain spaces or special characters (except _).";
        isValid = false;
    }

    // Email Validation
    const email = document.getElementById("email").value.trim();
    if (!email || !email.includes("@")) {
        document.getElementById("emailError").textContent = "Email must include the '@' symbol.";
        isValid = false;
    }

    // Password Validation
    const password = document.getElementById("password").value.trim();
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
    if (!password || !passwordRegex.test(password)) {
        document.getElementById("passwordError").textContent = "Password must be at least 8 characters long and include one uppercase letter, one lowercase letter, one number, and one special character.";
        isValid = false;
    }

    // Phone Validation
    const phone = document.getElementById("phone").value.trim();
    if (!phone || !/^(98|97|96)\d{8}$/.test(phone)) {
        document.getElementById("phoneError").textContent = "Phone must start with 98, 97, or 96 and contain only 10 digits.";
        isValid = false;
    }

    // Gender Validation
    const gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        document.getElementById("genderError").textContent = "Please select a gender.";
        isValid = false;
    }

    // Course Validation
    const course = document.getElementById("course").value;
    if (!course) {
        document.getElementById("courseError").textContent = "Please select a course.";
        isValid = false;
    }

    // Final Validation Check
    if (isValid) {
        alert("Form submitted successfully!");
    } else {
        alert("Please fix the errors in the form.");
    }
}
