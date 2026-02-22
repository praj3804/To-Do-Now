<h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

<h2 class="text-xl font-semibold mb-2">Users</h2>
<ul class="mb-6">
<?php foreach ($users as $user): ?>
    <li>
        <?= $user['name'] ?> (<?= $user['email'] ?>) - <?= $user['role'] ?>
    </li>
<?php endforeach; ?>
</ul>

<h2 class="text-xl font-semibold mb-2">All Tasks</h2>
<ul>
<?php foreach ($tasks as $task): ?>
    <li>
        <?= $task['title'] ?> - <?= $task['name'] ?>
    </li>
<?php endforeach; ?>
</ul>
