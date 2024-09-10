<?php include __DIR__ . '/../header.php'; ?>
<h1>Пользователи</h1>
<table>
    <?php foreach ($users as $userList) : ?>
        <tr>
            <td><?= $userList->getFullName() ?></td>
            <td>
                <a href="mailto:<?= $userList->getEmail() ?>"><?= $userList->getEmail() ?></a>
                <p style="color:blueviolet"><?php echo (($userList->getIsConfirmed()) ?  'Страница подтверждена' : 'Страница не подтверждена'); ?></p>
            </td>
            <td><a href="tel:+7<?= $userList->getPhone() ?>">+7<?= $userList->getPhone() ?></a></td>
            <td><?= $userList->getAddress() ?></td>
            <td><?= $userList->getPassportNum() ?></td>
            <td><?= $userList->getBirthday() ?></td>
            <td><?= $userList->getCreatedAt() ?></td>
            <td>
                <? if ($user !== null && $user->isAdmin()) : ?>
                    <a href="/users/<?= $userList->getId() ?>/delete">Удалить</a>
                <? endif ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include __DIR__ . '/../footer.php'; ?>