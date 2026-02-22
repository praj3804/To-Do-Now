<h1 class="text-2xl font-bold mb-6">Create Your Profile</h1>

<form action="/to-do-now/public/profile/store"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-4 bg-white p-6 rounded-xl shadow max-w-lg">

    <textarea name="bio"
        class="w-full p-2 border rounded"
        placeholder="Tell something about yourself"></textarea>

    <input type="text"
        name="phone"
        class="w-full p-2 border rounded"
        placeholder="Phone number">

    <input type="file"
        name="profile_image"
        class="w-full p-2 border rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Create Profile
    </button>

</form>