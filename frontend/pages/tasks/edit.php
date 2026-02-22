<h1 class="text-2xl font-bold mb-4">Edit Task</h1>

<form action="/to-do-now/public/tasks/update" method="POST" class="space-y-4">

    <input type="hidden" name="id" value="<?= $task['id'] ?>">

    <input type="text" name="title"
        value="<?= htmlspecialchars($task['title']) ?>"
        class="w-full p-2 border rounded" required>

    <textarea name="description"
        class="w-full p-2 border rounded"><?= htmlspecialchars($task['description']) ?></textarea>

    <input type="date" name="due_date"
        value="<?= $task['due_date'] ?>"
        class="w-full p-2 border rounded">

    <input type="checkbox" name="is_completed" id="is_completed"
        <?= $task['is_completed'] ? 'checked' : '' ?>
        class="mr-2">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Update Task
    </button>

</form>
