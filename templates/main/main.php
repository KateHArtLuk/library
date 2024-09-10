<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($books as $book) : ?>
    <h2><a href="/books/<?= $book->getId() ?>">«<?= $book->getName() ?>» <?= $book->getAuthor()->getFullName() ?></a></h2>
    <p><?php echo substr($book->getDescription(), 0, 300); ?>...</p>

    <? if ($user !== null && $user->isAdmin()) : ?>
        <p><a href="/books/<?= $book->getId() ?>/edit">Редактировать</a></p>
        <p><a href="/books/<?= $book->getId() ?>/delete">Удалить</a></p>
    <? endif ?>
    <hr>
<?php endforeach; ?>
<? if ($user !== null && $user->isAdmin()) : ?>
    <p><a href="/books/add">Добавить книгу</a></p>
<? endif ?>
<?php include __DIR__ . '/../footer.php'; ?>