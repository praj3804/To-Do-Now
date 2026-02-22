<h1 class="text-2xl font-bold mb-4 text-center">Create New Task</h1>

<form action="/to-do-now/public/tasks" method="POST" class="mb-6 space-y-3">

    <input type="text" name="title" placeholder="Task Title"
        class="w-full p-2 border rounded" required>

    <textarea name="description" placeholder="Description"
        class="w-full p-2 border rounded"></textarea>

    <input type="date" name="due_date"
        class="w-full p-2 border rounded">
    
    

    <button class="bg-blue-600 text-white px-4 py-2 rounded mx-auto block hover:bg-blue-700 transition">
        Add Task
    </button>

</form>