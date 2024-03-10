<?php

require 'partials/head.php';
require 'partials/nav.php';
require 'partials/banner.php';

?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <?php if(count($notes) > 0): ?>
      <ul class="my-4 mb-7 list-disc">
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

    <a href="/notes/create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create new</a>
  </div>
</main>

<?php
require 'partials/foot.php';
