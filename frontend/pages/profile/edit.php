<h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

<form action="/to-do-now/public/profile/update"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-4 bg-white p-6 rounded-xl shadow">

    <textarea name="bio" class="w-full p-2 border rounded"
        placeholder="Bio"><?= $profile['bio'] ?></textarea>

    <input type="text" name="phone"
        value="<?= $profile['phone'] ?>"
        class="w-full p-2 border rounded"
        placeholder="Phone">

    <input type="file" name="profile_image"
        class="w-full p-2 border rounded">

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Update Profile
    </button>

</form>