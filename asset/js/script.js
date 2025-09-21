// Growth Chart
const growthEl = document.getElementById("growthChart");
if (growthEl) {
  const growthCtx = growthEl.getContext("2d");
  new Chart(growthCtx, {
    type: "line",
    data: {
      labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      datasets: [
        {
          label: "Plant Growth (cm)",
          data: [12, 15, 18, 22, 25, 28, 32],
          borderColor: "#4a7c59",
          backgroundColor: "rgba(74, 124, 89, 0.1)",
          borderWidth: 3,
          fill: true,
          tension: 0.4,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: { color: "rgba(0,0,0,0.05)" },
        },
        x: {
          grid: { display: false },
        },
      },
    },
  });
}

// Weather Chart
const weatherEl = document.getElementById("weatherChart");
if (weatherEl) {
  const weatherCtx = weatherEl.getContext("2d");
  new Chart(weatherCtx, {
    type: "doughnut",
    data: {
      labels: ["Sunny", "Cloudy", "Rainy"],
      datasets: [
        {
          data: [60, 30, 10],
          backgroundColor: ["#d4af37", "#6c757d", "#2196f3"],
          borderWidth: 0,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: "bottom",
          labels: { padding: 20, usePointStyle: true },
        },
      },
    },
  });
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
