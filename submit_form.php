<?php
// Check if the form was submitted

echo '<pre>';
print_r($_POST);
echo '</pre>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data and sanitize it
    $full_name = htmlspecialchars(trim($_POST['full-name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars(trim($_POST['password']));
    $age = (int)$_POST['age'];
    $gender = htmlspecialchars(trim($_POST['gender']));
    $terms = isset($_POST['terms']) ? true : false;

    // Validate if all fields are provided
    if (empty($full_name) || empty($email) || empty($password) || empty($age) || empty($gender) || !$terms) {
        echo "<p style='color: red;'>Please fill all the required fields and agree to the Terms and Conditions.</p>";
    } else {
        // Display the success message in green with a big font
        echo "<h2 style='color: green; font-size: 36px; font-weight: bold;'>REGISTRATION SUCCESSFUL</h2>";
        
        // Optionally display the submitted information (if needed)
        // echo "<p><strong>Full Name:</strong> $full_name</p>";
        // echo "<p><strong>Email Address:</strong> $email</p>";
        // echo "<p><strong>Password:</strong> $password</p>";
        // echo "<p><strong>Age:</strong> $age</p>";
        // echo "<p><strong>Gender:</strong> $gender</p>";
        // echo "<p><strong>Terms and Conditions:</strong> " . ($terms ? 'Agreed' : 'Not Agreed') . "</p>";
    }
} else {
    echo "<p style='color: red;'>Form not submitted correctly.</p>";
}
?>
