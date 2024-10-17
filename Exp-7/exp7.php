<?php
$error_message = "";
$success_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Regular expressions for validation
    $name_pattern = "/^[a-zA-Z ]+$/";               // Only letters and spaces allowed
    $email_pattern = "/^[\w\-\.]+@([\w\-]+\.)+[\w]{2,4}$/";  // Simple email format
    $phone_pattern = "/^[0-9]{10}$/";               // 10-digit phone number

    // Validate name
    if (empty($name) || !preg_match($name_pattern, $name)) {
        $error_message = "Please enter a valid name (only letters and spaces allowed).";
    }
    // Validate email
    elseif (empty($email) || !preg_match($email_pattern, $email)) {
        $error_message = "Please enter a valid email address.";
    }
    // Validate phone number
    elseif (empty($phone) || !preg_match($phone_pattern, $phone)) {
        $error_message = "Please enter a valid 10-digit phone number.";
    } 
    else {
        // If all validations pass, show success message
        $success_message = "Form submitted successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Form Validation with PHP</title>
</head>
<body>
  <h2>Form Validation</h2>

  <!-- Display validation errors -->
  <?php if (!empty($error_message)) : ?>
    <div style="color:red;"><?php echo $error_message; ?></div>
  <?php endif; ?>

  <!-- Simple HTML Form -->
  <form method="POST" action="">
    Name: <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"><br><br>
    Email: <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"><br><br>
    Phone: <input type="text" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"><br><br>
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php
  // Display successful message if form is validated
  if (!empty($success_message)) {
    echo "<div style='color:green;'>" . $success_message . "</div>";
  }
  ?>
</body>
</html>
