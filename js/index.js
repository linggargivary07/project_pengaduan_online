// Fungsi untuk mengganti tipe input password (menampilkan/menyembunyikan)
function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  const toggleIcon = document.querySelector(".toggle-password");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleIcon.innerText = "visibility"; // Ganti ikon ke mata terbuka
  } else {
    passwordInput.type = "password";
    toggleIcon.innerText = "visibility_off"; // Ganti ikon ke mata tertutup
  }
}

// Logika saat formulir disubmit (hanya simulasi)
// document
//   .getElementById("loginForm")
//   .addEventListener("submit", function (event) {
//     event.preventDefault(); // Mencegah form submit default

//     const email = document.getElementById("email").value;
//     const password = document.getElementById("password").value;

//     // VALIDASI SEDERHANA
//     if (email === "" || password === "") {
//       alert("Email dan Password harus diisi.");
//       return;
//     }

//     // SIMULASI LOGIN BERHASIL
//     console.log(`Mencoba login dengan Email: ${email}`);
//     window.location.href = "user_dashboard.php"; // Arahkan ke dashboard (simulasi

//     // Di aplikasi nyata:
//     // 1. Kirim data ke API menggunakan fetch()
//     // 2. Jika sukses, simpan token otentikasi
//     // 3. Redirect ke halaman dashboard
//   });
