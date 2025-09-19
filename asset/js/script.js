// Growth Chart
const growthCtx = document.getElementById("growthChart").getContext("2d");
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
      legend: {
        display: false,
      },
    },
    scales: {
      y: {
        beginAtZero: true,
        grid: {
          color: "rgba(0,0,0,0.05)",
        },
      },
      x: {
        grid: {
          display: false,
        },
      },
    },
  },
});

// Weather Chart
const weatherCtx = document.getElementById("weatherChart").getContext("2d");
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
        labels: {
          padding: 20,
          usePointStyle: true,
        },
      },
    },
  },
});

// Navigation
$(".nav-link[data-page]").on("click", (e) => {
  e.preventDefault();
  const page = $(e.currentTarget).data("page");
  this.navigateToPage(page);
});

// Sidebar toggle for mobile
$("#sidebarToggle").on("click", () => {
  $("#sidebar").toggleClass("show");
});

// Close sidebar on mobile when clicking outside
$(document).on("click", (e) => {
  if (
    $(window).width() <= 768 &&
    !$(e.target).closest(".sidebar, #sidebarToggle").length
  ) {
    $("#sidebar").removeClass("show");
  }
});

// Logout
$("#logoutBtn").on("click", (e) => {
  e.preventDefault();
  this.logout();
});