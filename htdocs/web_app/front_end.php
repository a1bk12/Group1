<!DOCTYPE html>
<html>
<head>
    <title>Signup and Login</title>
</head>
<body>
    <h1>Signup</h1>
    <form id="signup-form">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Signup</button>
    </form>

    <h1>Login</h1>
    <form id="login-form">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <div id="response-message"></div>

    <script>
        // JavaScript code here
        document.addEventListener("DOMContentLoaded", function() {
    const signupForm = document.getElementById("signup-form");
    const loginForm = document.getElementById("login-form");
    const responseMessage = document.getElementById("response-message");

    // Function to handle API response
    function handleResponse(response) {
        responseMessage.textContent = response.message;
    }

    // Signup form submission
    signupForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(signupForm);

        fetch("your_php_backend/signup.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => handleResponse(data));
    });

    // Login form submission
    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(loginForm);

        fetch("your_php_backend/login.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => handleResponse(data));
    });
});

    </script>
</body>
</html>