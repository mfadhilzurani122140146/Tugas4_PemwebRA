/* process.php */
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = trim($_POST['age']);
    $bio = trim($_POST['bio']);
    $file = $_FILES['file'];

    // Validation
    $errors = [];
    if (strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters long.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if ($age <= 0 || $age > 150) {
        $errors[] = "Age must be between 1 and 150.";
    }
    if (strlen($bio) < 10) {
        $errors[] = "Biography must be at least 10 characters long.";
    }
    if ($file['size'] > 1024 * 1024) {
        $errors[] = "File size must be less than 1MB.";
    }
    if ($file['type'] !== "text/plain") {
        $errors[] = "Only .txt files are allowed.";
    }

    // Process file content
    if (empty($errors)) {
        $fileContent = file_get_contents($file['tmp_name']);
        $lines = explode(PHP_EOL, $fileContent);
    }

    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    if (!empty($errors)) {
        echo "<h3>Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['age'] = $age;
        $_SESSION['bio'] = $bio;
        $_SESSION['fileContent'] = $lines;
        $_SESSION['userAgent'] = $userAgent;

        header("Location: result.php");
        exit();
    }
}
?>
