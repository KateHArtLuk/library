<?php include __DIR__ . '/../header.php'; ?>
<p>ISBN: <?= $book->getIsbn() ?></p>
<h1>«<?= $book->getName() ?>»</h1>
<h2>Автор: <a href="http://library/authors/<?= $book->getAuthor()->getId() ?>"><?= $book->getAuthor()->getFullName() ?></a></h2>
<p>ББК: <?= $book->getBbk()->getBbk() ?> - <?= $book->getBbk()->getDescription() ?></p>
<p>Издательство: <?= $book->getPublishHouse()->getName() ?></p>
<p>Год издания: <?= $book->getYearPublishing() ?></p>

<? if ($user !== null && $user->isAdmin()) : ?>
    <p>Зал: <?= $book->getHall() ?></p>
    <p>Полка: <?= $book->getShelf() ?></p>
    <p><a href="/books/<?= $book->getId() ?>/edit">Редактировать</a></p>
<? endif ?>

<hr>
<h3>Описание</h3>
<p><?= $book->getDescription() ?></p>
<?php include __DIR__ . '/../footer.php'; ?>