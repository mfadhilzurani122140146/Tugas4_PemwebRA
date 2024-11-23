<?php
session_start();
if (!isset($_SESSION['form_data'])) {
    header("Location: form.php");
    exit();
}

$data = $_SESSION['form_data'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h2>Data Pendaftaran</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo htmlspecialchars($data['nama']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo htmlspecialchars($data['email']); ?></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><?php echo htmlspecialchars($data['umur']); ?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><?php echo htmlspecialchars($data['telepon']); ?></td>
            </tr>
            <tr>
                <td>Browser</td>
                <td><?php echo htmlspecialchars($data['browser']); ?></td>
            </tr>
            <tr>
                <td>Operating System</td>
                <td><?php echo htmlspecialchars($data['os']); ?></td>
            </tr>
        </table>

        <h3>Isi File:</h3>
        <pre><?php echo htmlspecialchars($data['file_content']); ?></pre>
    </div>
</body>
</html>

<?php
// Bersihkan session setelah ditampilkan
unset($_SESSION['form_data']);
?>
