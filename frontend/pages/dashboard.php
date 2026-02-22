
<h1 class="text-2xl font-bold mb-4">Your Activity</h1>

<div class="grid grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="w-20 h-20 mx-auto rounded-full border-4 border-blue-500 flex items-center justify-center text-xl font-bold">
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
            <?= $remainingTasks ?>
        </div>
        <p class="mt-3 text-gray-600">Remaining</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="w-20 h-20 mx-auto rounded-full border-4 border-purple-500 flex items-center justify-center text-xl font-bold">
            <?= $completionPercentage ?>%
        </div>
        <p class="mt-3 text-gray-600">Completion</p>
    </div>

</div>
<div class="bg-white p-6 rounded-xl shadow mb-8 ">
    <h2 class="text-xl font-semibold mb-4">Productivity</h2>
<div class="w-64 h-64 mx-auto">
    <canvas id="productivityChart"></canvas>
</div>
</div>

<script>
const ctx = document.getElementById('productivityChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Completed', 'Remaining'],
        datasets: [{
            data: [<?= $completedTasks ?>, <?= $remainingTasks ?>],
            backgroundColor: ['#22c55e', '#ef4444']
        }]
    },
    options: {
        responsive: true
    }
});
</script>
<div class="bg-white p-6 rounded-xl shadow mb-8">
    <h2 class="text-xl font-semibold mb-4 text-black-500">Your Tasks</h2>

    <?php 
    $hasIncomplete = false;
    foreach ($tasks as $task) {
        if (!$task['status']) {
            $hasIncomplete = true;
            break;
        }
    }
    ?>

    <?php if ($hasIncomplete): ?>
        <ul class="space-y-3">
            <?php foreach ($tasks as $task): ?>
                <?php if (!$task['status']): ?>
                    <li class="p-4 border rounded flex justify-between items-center">
                        <div>
                            <h3 class="font-semibold">
                                <?= htmlspecialchars($task['title']) ?>
                            </h3>
                            <p class="text-sm text-gray-600">
                                <?= htmlspecialchars($task['description']) ?>
                            </p>
                        </div>

                        <div class="space-x-3">
                            <a href="/to-do-now/public/tasks/complete?id=<?= $task['id'] ?>"
                               class="text-green-600">Complete</a>

                            <a href="/to-do-now/public/tasks/edit?id=<?= $task['id'] ?>"
                               class="text-blue-600">Edit</a>

                            <a href="/to-do-now/public/tasks/delete?id=<?= $task['id'] ?>"
                               class="text-red-600">Delete</a>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-gray-500">No incomplete tasks 🎉</p>
    <?php endif; ?>
</div>
<div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-semibold mb-4 text-green-600">Completed Tasks</h2>

    <?php 
    $hasCompleted = false;
    foreach ($tasks as $task) {
        if ($task['status']) {
            $hasCompleted = true;
            break;
        }
    }
    ?>

    <?php if ($hasCompleted): ?>
        <ul class="space-y-3">
            <?php foreach ($tasks as $task): ?>
                <?php if ($task['status']): ?>
                    <li class="p-4 border rounded flex justify-between items-center bg-green-50">
                        <div>
                            <h3 class="font-semibold line-through text-gray-500">
                                <?= htmlspecialchars($task['title']) ?>
                            </h3>
                            <p class="text-sm text-gray-500">
                                <?= htmlspecialchars($task['description']) ?>
                            </p>
                        </div>

                        <a href="/to-do-now/public/tasks/delete?id=<?= $task['id'] ?>"
                           class="text-red-600">Delete</a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-gray-500">No completed tasks yet.</p>
    <?php endif; ?>
</div>