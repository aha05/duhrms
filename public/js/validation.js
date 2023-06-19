
function validateForm() {
    // Get the form element
    var form = document.getElementById("myForm");

    // Get the values of the input fields
    var name = form.elements["name"].value;
    var email = form.elements["email"].value;
    var password = form.elements["password"].value;
    var birthdate = form.elements["birthdate"].value;

    // Regular expression for name validation (allowing letters and spaces)
    var nameRegex = /^[A-Za-z\s]+$/;

    // Regular expression for email validation
    var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;

    // Regular expression for password validation (at least 6 characters)
    var passwordRegex = /^.{6,}$/;

    // Check if name is valid
    if (!name.match(nameRegex)) {
        alert("Please enter a valid name");
        return false;
    }

    // Check if email is valid
    if (!email.match(emailRegex)) {
        alert("Please enter a valid email address");
        return false;
    }

    // Check if password is valid
    if (!password.match(passwordRegex)) {
        alert("Password must be at least 6 characters long");
        return false;
    }

    // Check if birthdate is valid
    if (!birthdate) {
        alert("Please enter your birthdate");
        return false;
    }

    // Form is valid
    return true;
}

// Add form submission event listener
document.getElementById("myForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission
    if (validateForm()) {
        // Form is valid, do something (e.g., submit the form)
        alert("Form submitted successfully!");
        // Uncomment the line below to submit the form
        // document.getElementById("myForm").submit();
    }
});

