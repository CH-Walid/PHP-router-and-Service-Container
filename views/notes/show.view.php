<?php

require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');

?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a href="/notes" class="text-blue-700 underline">Go Back</a>
    <div class="mt-4">
      <p><b>Body:</b> <?= htmlspecialchars($note['body']) ?></p>
    </div>
    <form method="POST" class="mt-6">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="id" value="<?= htmlspecialchars($note['id']) ?>">
      <button type="submit" class="text-sm text-red-500">Delete</button>
    </form>
  </div>
</main>

<?php
require base_path('views/partials/foot.php');
