// Total Produk
function updateProductCount() {
  const tbody = document.getElementById("productTableBody");
  const visibleRows = tbody.querySelectorAll(
    "tr:not([style*='display: none'])"
  );
  document.getElementById("totalProducts").textContent = visibleRows.length;
}

document.addEventListener("DOMContentLoaded", updateProductCount);

// Filer dan Search
function filterTable() {
  var searchVal = $("#searchProduct").val().toLowerCase().trim();
  var unitVal = $("#filterUnit").val().toLowerCase().trim();
  var anyVisible = false; 

  $("#productTable tbody tr").each(function () {
    var rowText = $(this).text().toLowerCase();
    var unit = $(this).find(".unit-col").text().toLowerCase().trim() || "kosong";

    var matchSearch = !searchVal || rowText.indexOf(searchVal) > -1;
    var matchUnit = !unitVal || unit === unitVal;

    if (matchSearch && matchUnit) {
      $(this).show();
      anyVisible = true;
    } else {
      $(this).hide();
    }
  });

  if (anyVisible) {
    $("#noResults").addClass("d-none");
  } else {
    $("#noResults").removeClass("d-none");
  }
} 

// Sidebar toggle
$(document).ready(function () {
  $("#sidebarToggle").on("click", function () {
    $("#sidebarbtn").toggleClass("show");
  });

  // Klik di luar sidebar buat close
  $(document).on("click", function (e) {
    if (
      $(window).width() < 768 &&
      !$(e.target).closest("#sidebarbtn, #sidebarToggle").length
    ) {
      $("#sidebarbtn").removeClass("show");
    }
  });
});

document
  .getElementById("sidebarToggle")
  ?.addEventListener("click", function (e) {
    const btn = e.currentTarget;
    btn.classList.toggle("active");
    const expanded = btn.getAttribute("aria-expanded") === "true";
    btn.setAttribute("aria-expanded", String(!expanded));
  });

$(document).ready(function () {
  $("#searchProduct").on("keyup", filterTable);
  $("#filterUnit").on("change", filterTable);
});

// Fungsi format ke Rupiah
function formatRupiah(angka, prefix = "Rp ") {
  let number_string = angka.replace(/[^,\d]/g, ""),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  if (ribuan) {
    let separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;
  return prefix + rupiah;
}

$(document).ready(function () {
  let initialPrice = $("#price").val();
  if (initialPrice) {
    initialPrice = parseFloat(initialPrice).toString();
    $("#price").val(formatRupiah(initialPrice));
  }

  $("#price").on("input", function () {
    let nilai = $(this).val();
    $(this).val(formatRupiah(nilai));
  });

  $("form").on("submit", function () {
    let harga = $("#price").val().replace(/[^0-9]/g, "");
    $("#price").val(harga);
  });
});

// Preview Gambar Upload
document.getElementById("image").addEventListener("change", function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const preview = document.getElementById("preview");
      preview.src = e.target.result;
      preview.style.display = "block";
      preview.style.maxWidth = "110px";
    };
    reader.readAsDataURL(file);
  }
});