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
  </div>
</main>

<?php
require base_path('views/partials/foot.php');
