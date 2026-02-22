<h1 class="text-2xl font-bold mb-4 text-center">Register</h1>

<form action="/to-do-now/public/register" method="POST" class="space-y-4 w-1/2 mx-auto bg-white p-6 rounded shadow">

    <input type="text" name="name" placeholder="Name"
        class="w-full p-2 border rounded" required>

    <input type="email" name="email" placeholder="Email"
        class="w-full p-2 border rounded" required>

    <input type="password" name="password" placeholder="Password"
        class="w-full p-2 border rounded" required>
   

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mx-auto block">
        Register
    </button>
    <p class="text-center text-sm">
        Already have an account? <a href="/to-do-now/public/login" class="text-blue-600 hover:underline">Login here</a>

</form>
