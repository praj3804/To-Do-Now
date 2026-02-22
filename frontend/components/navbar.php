<nav class="bg-gray-700 p-4 text-white">
    <div class="container mx-auto flex justify-between">
        <a href="/to-do-now/public/" class="font-bold text-4xl">To-Do-Now</a>

        <div>
            <?php if (isset($_SESSION['user'])): ?>
                <p class="font-bold text-white">Welcome <?= $_SESSION['user']['name'] ?></p>
                <a href="/to-do-now/public/logout" class="ml-4 hover:text-red-200 hover:underline">Logout</a>
                <a href="/to-do-now/public" class="ml-4 hover:text-blue-200 hover:underline">Home</a>
                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                    <a href="/to-do-now/public/admin/dashboard" class="ml-4 hover:text-blue-200 hover:underline">Dashboard</a>
                                    

                <?php else: ?>
                    <a href="/to-do-now/public/profile"  class="ml-4 hover:text-blue-200 hover:underline">Profile</a>
                    <a href="/to-do-now/public/dashboard" class="ml-4 hover:text-blue-200 hover:underline">dashboard</a>
                   

                <?php endif; ?>
            <?php else: ?>
                <a href="/to-do-now/public/login" class="ml-4 hover:text-blue-200 hover:underline">Login</a>
                <a href="/to-do-now/public/register" class="ml-4 hover:text-blue-200 hover:underline">Register</a>
                <a href="/to-do-now/public" class="ml-4 hover:text-blue-200 hover:underline">Home</a>

            <?php endif; ?>
        </div>
    </div>
</nav>
