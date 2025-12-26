// Menunggu DOM dimuat sepenuhnya
document.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.getElementById("sidebar");
  const openBtn = document.getElementById("open-sidebar");
  const closeBtn = document.getElementById("close-sidebar");

  // Fungsi untuk membuka sidebar
  openBtn.addEventListener("click", () => {
    sidebar.classList.add("active");
  });

  // Fungsi untuk menutup sidebar
  closeBtn.addEventListener("click", () => {
    sidebar.classList.remove("active");
  });

  // Menutup sidebar jika mengklik di luar area sidebar (opsional untuk UX yang lebih baik)
  document.addEventListener("click", (e) => {
    if (
      !sidebar.contains(e.target) &&
      !openBtn.contains(e.target) &&
      sidebar.classList.contains("active")
    ) {
      sidebar.classList.remove("active");
    }
  });
});
