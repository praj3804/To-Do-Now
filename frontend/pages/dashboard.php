<h1 class="text-2xl font-bold mb-4">Your Tasks</h1>



<?php if (!empty($tasks)): ?>
    <ul class="space-y-3">
        <?php foreach ($tasks as $task): ?>
            <li class="bg-white p-4 rounded shadow flex justify-between items-center">
                <div>
                    <h2 class="font-semibold">
                        <?= htmlspecialchars($task['title']) ?>
                    </h2>
                    <p class="text-sm text-gray-600">
                        <?= htmlspecialchars($task['description']) ?>
                    </p>
                </div>
                <div class="space-x-2">
                    <?php if (!$task['status']): ?>
                        <a href="/to-do-now/public/tasks/complete?id=<?= $task['id'] ?>"
                           class="text-green-600">Complete</a>
                    <?php endif; ?>
                        <a href="/to-do-now/public/tasks/edit?id=<?= $task['id'] ?>"
   class="text-blue-600">Edit</a>

                    <a href="/to-do-now/public/tasks/delete?id=<?= $task['id'] ?>"
                       class="text-red-600">Delete</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No tasks yet.</p>
<?php endif; ?>

<button class="bg-green-600 text-white px-4 py-2 rounded mt-4 hover:bg-green-700 transition block mx-auto">
    <a href="/to-do-now/public/tasks/create">Add New Task</a>
