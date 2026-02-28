<h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

<!-- STAT CARDS -->
<div class="grid grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="w-20 h-20 mx-auto rounded-full border-4 border-blue-500 flex items-center justify-center text-xl font-bold">
            <?= $totalUsers ?>
        </div>
        <p class="mt-3 text-gray-600">Total Users</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="w-20 h-20 mx-auto rounded-full border-4 border-purple-500 flex items-center justify-center text-xl font-bold">
            <?= $totalTasks ?>
        </div>
        <p class="mt-3 text-gray-600">Total Tasks</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="w-20 h-20 mx-auto rounded-full border-4 border-green-500 flex items-center justify-center text-xl font-bold">
            <?= $completedTasks ?>
        </div>
        <p class="mt-3 text-gray-600">Completed</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="w-20 h-20 mx-auto rounded-full border-4 border-red-500 flex items-center justify-center text-xl font-bold">
            <?= $pendingTasks ?>
        </div>
        <p class="mt-3 text-gray-600">Pending</p>
    </div>

</div>

<!-- GROWTH GRAPH -->
<div class="bg-white p-6 rounded-xl shadow mb-8">
    <h2 class="text-xl font-semibold mb-6">Task Growth Over Time</h2>

    <div class="relative h-80">
        <canvas id="growthChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('growthChart').getContext('2d');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= $dates ?>,
        datasets: [{
            label: 'Users Logged In',
            data: <?= $counts ?>,
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59, 130, 246, 0.15)',
            borderWidth: 3,
            tension: 0.3,
            fill: true,
            pointRadius: 4,
            pointBackgroundColor: '#3b82f6'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});
</script>