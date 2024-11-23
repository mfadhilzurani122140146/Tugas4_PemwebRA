/* result.php */
<?php
session_start();
if (!isset($_SESSION['name'])) {
    echo "No data available.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Result</title>
</head>
<body>
    <h2>Submitted Data</h2>
    <table border="1">
        <tr><th>Name</th><td><?php echo htmlspecialchars($_SESSION['name']); ?></td></tr>
        <tr><th>Email</th><td><?php echo htmlspecialchars($_SESSION['email']); ?></td></tr>
        <tr><th>Age</th><td><?php echo htmlspecialchars($_SESSION['age']); ?></td></tr>
        <tr><th>Biography</th><td><?php echo htmlspecialchars($_SESSION['bio']); ?></td></tr>
        <tr><th>Browser/OS Info</th><td><?php echo htmlspecialchars($_SESSION['userAgent']); ?></td></tr>
    </table>

    <h2>File Content</h2>
    <table border="1">
        <tr><th>Line Number</th><th>Content</th></tr>
        <?php
        foreach ($_SESSION['fileContent'] as $index => $line) {
            echo "<tr><td>" . ($index + 1) . "</td><td>" . htmlspecialchars($line) . "</td></tr>";
        }
        ?>
    </table>
</body>
</html>
