  </body>
</html>
<script>
  function toggleUserDropdown() {
    const dropdown = document.getElementById("userDropdown");
    dropdown.classList.toggle("hidden");
  }

  // Tutup dropdown saat klik di luar
  window.addEventListener("click", function (e) {
    const button = document.getElementById("userDropdownBtn");
    const dropdown = document.getElementById("userDropdown");
    if (!button.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.add("hidden");
    }
  });
</script>