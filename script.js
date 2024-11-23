/* script.js */
document
  .getElementById("registrationForm")
  .addEventListener("submit", function (event) {
    let name = document.getElementById("name").value;
    let bio = document.getElementById("bio").value;
    let file = document.getElementById("file").files[0];

    if (name.length < 3) {
      alert("Name must be at least 3 characters long.");
      event.preventDefault();
    }
    if (bio.length < 10) {
      alert("Biography must be at least 10 characters long.");
      event.preventDefault();
    }
    if (file) {
      if (file.size > 1024 * 1024) {
        alert("File size must be less than 1MB.");
        event.preventDefault();
      }
      if (file.type !== "text/plain") {
        alert("Only .txt files are allowed.");
        event.preventDefault();
      }
    }
  });
