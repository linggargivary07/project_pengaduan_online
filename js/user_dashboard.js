document.addEventListener("DOMContentLoaded", () => {
  // Tombol New Complaint
  const newComplaintBtn = document.getElementById("new-complaint-btn");
  if (newComplaintBtn) {
    newComplaintBtn.addEventListener("click", () => {
      alert("Membuka formulir pengaduan baru...");
      // Di sini Anda bisa mengarahkan ke halaman form:
      // window.location.href = 'form-pengaduan.html';
    });
  }

  // Sidebar Toggle (Gunakan kode yang sama dengan Admin sebelumnya)
  const sidebar = document.getElementById("sidebar");
  const openBtn = document.getElementById("open-sidebar");
  const closeBtn = document.getElementById("close-sidebar");

  if (openBtn) {
    openBtn.addEventListener("click", () => sidebar.classList.add("active"));
  }
  if (closeBtn) {
    closeBtn.addEventListener("click", () =>
      sidebar.classList.remove("active")
    );
  }
});
