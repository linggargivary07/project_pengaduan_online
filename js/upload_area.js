document.addEventListener("DOMContentLoaded", () => {
  // ... (Sidebar Toggle dan kode yang sudah ada dari admin-room-management.js jika digabung) ...

  // Elemen untuk File Upload
  const dropArea = document.getElementById("dropArea");
  const roomImageInput = document.getElementById("roomImage");
  const chooseFileBtn = document.getElementById("chooseFileBtn");
  const fileNameDisplay = document.getElementById("file-name");

  // Elemen Formulir
  const addRoomForm = document.getElementById("add-room-form");

  // --- Fungsionalitas File Upload ---

  // 1. Trigger input file saat tombol diklik
  chooseFileBtn.addEventListener("click", () => {
    roomImageInput.click();
  });

  // 2. Tampilkan nama file yang dipilih
  roomImageInput.addEventListener("change", () => {
    if (roomImageInput.files.length > 0) {
      fileNameDisplay.textContent = `File chosen: ${roomImageInput.files[0].name}`;
    } else {
      fileNameDisplay.textContent = "No file chosen.";
    }
  });

  // 3. Drop Area (Drag Over)
  dropArea.addEventListener("dragover", (event) => {
    event.preventDefault();
    dropArea.style.borderColor = "#007bff";
  });

  // 4. Drop Area (Drag Leave)
  dropArea.addEventListener("dragleave", () => {
    dropArea.style.borderColor = "#e9ecef";
  });

  // 5. Drop Area (Drop File)
  dropArea.addEventListener("drop", (event) => {
    event.preventDefault();
    dropArea.style.borderColor = "#e9ecef";

    // Ambil file yang didrop
    const files = event.dataTransfer.files;
    if (files.length > 0 && files[0].type.startsWith("image/")) {
      roomImageInput.files = files; // Set file ke input
      fileNameDisplay.textContent = `File chosen: ${files[0].name}`;
    } else {
      alert("Tolong drop file gambar yang valid.");
      fileNameDisplay.textContent = "No file chosen.";
    }
  });
});
