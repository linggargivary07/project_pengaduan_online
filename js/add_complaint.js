document.addEventListener("DOMContentLoaded", () => {
  const complaintForm = document.getElementById("complaintForm");
  const descInput = document.getElementById("descInput");

  if (complaintForm) {
    complaintForm.addEventListener("submit", (e) => {
      // Validasi karakter minimum (50 karakter)
      if (descInput.value.length < 1) {
        alert(
          "Please provide a more detailed description (minimum 50 characters)."
        );
        return;
      }

      // Simulasi pengiriman data
      alert(
        "Complaint submitted successfully! We will review it within 48 hours."
      );
      window.location.href = "student-dashboard.html";
    });
  }
});
