function validateForm() {
  var nama = document.forms["registrationForm"]["nama"].value;
  var email = document.forms["registrationForm"]["email"].value;
  var umur = document.forms["registrationForm"]["umur"].value;
  var telepon = document.forms["registrationForm"]["telepon"].value;
  var file = document.forms["registrationForm"]["dataFile"].files[0];

  if (nama.length < 3) {
      alert("Nama harus minimal 3 karakter!");
      return false;
  }

  if (!email.includes("@")) {
      alert("Email tidak valid!");
      return false;
  }

  if (umur < 17 || umur > 100) {
      alert("Umur harus antara 17-100 tahun!");
      return false;
  }

  if (telepon.length < 10 || telepon.length > 13) {
      alert("Nomor telepon harus 10-13 digit!");
      return false;
  }

  if (file) {
      if (file.size > 1024 * 1024) { // 1MB
          alert("Ukuran file tidak boleh lebih dari 1MB!");
          return false;
      }
      if (!file.name.endsWith('.txt')) {
          alert("File harus berformat .txt!");
          return false;
      }
  }

  return true;
}
