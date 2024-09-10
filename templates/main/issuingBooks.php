<?php include __DIR__ . '/../header.php'; ?>
<h1>Выдача книг</h1>
<table>
    <?php foreach ($issuingBooks as $issuingBook) : ?>
        <tr>
            <td><a href="/books/<?= $issuingBook->getBook()->getId() ?>">«<?= $issuingBook->getBook()->getName() ?>»</a></td>
            <td><?= $issuingBook->getUser()->getLogin() ?></td>
            <td><?= $issuingBook->getDateIssue() ?></td>
            <td><?= $issuingBook->getDateReturn() ?></td>
            <td>
                <?php echo (($issuingBook->getReturned() == 1) ? 'Возвращена' : 'На руках'); ?>
            </td>
            <td>
                <a href="/issuingbooks/<?= $issuingBook->getId() ?>/edit">Изменить</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include __DIR__ . '/../footer.php'; ?>