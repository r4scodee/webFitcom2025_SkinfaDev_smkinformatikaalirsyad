<?php ob_start(); ?>
<h3 class="mb-4">Dashboard</h3>
<div class="row g-3">
  <div class="col-md-4">
    <div class="card card-custom p-3">
      <h6>Weather Today</h6>
      <p class="fs-4 fw-bold">29°C ☀️</p>
      <small>Humidity: 68% | Wind: 6km/h</small>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-custom p-3">
      <h6>Summary of Production</h6>
      <canvas id="chartProduction" height="100"></canvas>
    </div>
  </div>
</div>

<script>
const ctx = document.getElementById('chartProduction');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    datasets: [{
      label: 'Tahun Ini',
      data: [500,800,1200,1500,2000,2500,3000,2800,2600,2200,1800,2000],
      backgroundColor: '#28a745'
    },{
      label: 'Tahun Lalu',
      data: [400,600,1000,1300,1700,2200,2500,2300,2100,1900,1500,1800],
      backgroundColor: '#82c91e'
    }]
  },
  options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
});
</script>
