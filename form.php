<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Form Pendaftaran</h2>
        <form id="registrationForm" action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-group">
                <label>Nama Lengkap:</label>
                <input type="text" name="nama" minlength="3" maxlength="50" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Umur:</label>
                <input type="number" name="umur" min="17" max="100" required>
            </div>

            <div class="form-group">
                <label>Nomor Telepon:</label>
                <input type="tel" name="telepon" pattern="[0-9]{10,13}" required>
            </div>

            <div class="form-group">
                <label>File Data (txt):</label>
                <input type="file" name="dataFile" accept=".txt" required>
            </div>

            <button type="submit">Daftar</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
