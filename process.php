<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function sanitizeInput($data) {
        $data = trim($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        $data = strip_tags($data);
        return $data;
    }

    $nama = sanitizeInput($_POST['nama']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $umur = filter_input(INPUT_POST, 'umur', FILTER_VALIDATE_INT);
    $telepon = sanitizeInput($_POST['telepon']);

    if (!$nama || strlen($nama) < 3) {
        die("Nama tidak valid! Minimal 3 karakter.");
    }

    if (!$email) {
        die("Email tidak valid!");
    }

    if (!$umur || $umur < 17 || $umur > 100) {
        die("Umur tidak valid! Harus antara 17-100 tahun.");
    }

    if (!$telepon || strlen($telepon) < 10 || strlen($telepon) > 13) {
        die("Nomor telepon tidak valid! Harus antara 10-13 digit.");
    }

    $fileContent = '';
    if (isset($_FILES['dataFile'])) {
        $file = $_FILES['dataFile'];
        
        if ($file['size'] > 1024 * 1024) {
            die("Ukuran file terlalu besar! Maksimal 1MB.");
        }

        if ($file['type'] !== 'text/plain') {
            die("Tipe file harus text (.txt)!");
        }

        $fileContent = sanitizeInput(file_get_contents($file['tmp_name']));
    }

    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $browser = get_browser_name($userAgent);
    $os = get_os_name($userAgent);

    session_start();
    $_SESSION['form_data'] = [
        'nama' => $nama,
        'email' => $email,
        'umur' => $umur,
        'telepon' => $telepon,
        'file_content' => $fileContent,
        'browser' => $browser,
        'os' => $os,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    header("Location: result.php");
    exit();
}

function get_browser_name($userAgent) {
    if (strpos($userAgent, 'Firefox')) return 'Firefox';
    if (strpos($userAgent, 'Chrome')) return 'Chrome';
    if (strpos($userAgent, 'Safari')) return 'Safari';
    if (strpos($userAgent, 'Edge')) return 'Edge';
    if (strpos($userAgent, 'Opera') || strpos($userAgent, 'OPR/')) return 'Opera';
    return 'Browser tidak dikenal';
}

function get_os_name($userAgent) {
    if (strpos($userAgent, 'Windows')) return 'Windows';
    if (strpos($userAgent, 'Mac')) return 'MacOS';
    if (strpos($userAgent, 'Linux')) return 'Linux';
    if (strpos($userAgent, 'Android')) return 'Android';
    if (strpos($userAgent, 'iOS')) return 'iOS';
    return 'OS tidak dikenal';
}
?>
