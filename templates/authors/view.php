<?php include __DIR__ . '/../header.php'; ?>
<h1><?= $author->getFullName() ?></h1>
<p>Дата рождения: <?= $author->getBirthday() ?></p>
<p>Место рождения: <?= $author->getBirthplace() ?></p>

<? if ($author->getDateDeath() !== 'Нет данных') : ?>
    <p>Дата смерти: <?= $author->getDateDeath() ?></p>
<? endif ?>

<? if ($author->getPlaceDeath() !== 'Нет данных') : ?>
    <p>Место смерти: <?= $author->getPlaceDeath() ?></p>
<? endif ?>
<? if ($author->getYearsCreativity() !== 'Нет данных') : ?>
    <p>Годы творчества: <?= $author->getYearsCreativity() ?></p>
<? endif ?>

<hr>
<h2>Книги</h2>
<?php foreach($books as $book) : ?>
    <?php if ($book->getAuthor()->getFullName() == $author->getFullName()) : ?>
        <p><a href="/books/<?= $book->getId() ?>"><?= $book->getName() ?></a></p>
    <?php endif; ?>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>