<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($authors as $author): ?>
    <h2><a href="/authors/<?= $author->getId() ?>"><?= $author->getFullName() ?></a></h2>
    <p>Годы творчества: <?= $author->getYearsCreativity() ?></p>
    <hr>

<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>
