<h1 class="text-2xl font-bold mb-4 text-center">Login</h1>

<form action="/to-do-now/public/login" method="POST" class="space-y-4 w-1/2 mx-auto bg-white p-6 rounded shadow">

    <input type="email" name="email" placeholder="Email"
        class="w-full p-2 border rounded" required>

    <input type="password" name="password" placeholder="Password"
        class="w-full p-2 border rounded" required>

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mx-auto block">
        Login
    </button>
    <p class="text-center text-sm">
        Don't have an account? <a href="/to-do-now/public/register" class="text-blue-600 hover:underline">Register here</a>

</form>

