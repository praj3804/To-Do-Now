<h1 class="text-2xl font-bold mb-6">Your Profile</h1>

<div class="bg-white p-6 rounded-xl shadow mx-auto max-w-lg items-center flex flex-col">

    <?php if (!empty($profile['profile_image'])): ?>
        <img src="/to-do-now/public/<?= $profile['profile_image'] ?>"
             class="w-32 h-32 rounded-full mb-4">
    <?php endif; ?>

    <p><strong>Name:</strong> <?= $_SESSION['user']['name'] ?></p>
    <p><strong>Email:</strong> <?= $_SESSION['user']['email'] ?></p>
    <p><strong>Phone:</strong> <?= $profile['phone'] ?></p>
    <p><strong>Bio:</strong> <?= $profile['bio'] ?></p>

    <a href="/to-do-now/public/profile/edit"
       class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
       Edit Profile
    </a>
</div>