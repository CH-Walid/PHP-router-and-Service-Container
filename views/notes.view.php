<?php

require 'partials/head.php';
require 'partials/nav.php';
require 'partials/banner.php';

?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <?php if(count($notes) > 0): ?>
      <ul class="mt-4 list-disc">
        <?php foreach($notes as $note): ?>
          <li>
            <a href="/note?id=<?= $note['id'] ?>" class="text-blue-700 hover:underline">
              <?= htmlspecialchars($note['body']) ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
    <?php else: ?>
      <p>No notes!</p>
    <?php endif; ?>
  </div>
</main>

<?php
require 'partials/foot.php';
