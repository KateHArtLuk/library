<?php include __DIR__ . '/../header.php'; ?>
<h1><?= $user->getFullName() ?></h1>
<address>
   <h2>Email: <a href="mailto:<?= $user->getEmail() ?>"><?= $user->getEmail() ?></a></h2>
   <p>Номер телефона: <a href="tel:+7<?= $user->getPhone() ?>">+7 <?= $user->getPhone() ?></a></p>
   <p>Адрес: <?= $user->getAddress() ?></p>
</address>
<p>Серия и номер паспорта: <?= $user->getPassportNum() ?></p>
<p>Дата рождения: <?= $user->getBirthday() ?></p>
<p>Дата регистрации: <?= $user->getCreatedAt() ?></p>
<p style="color:blueviolet"><?= (($user->getIsConfirmed()) ?  'Страница подтверждена' : 'Страница не подтверждена'); ?></p>
</p>

<?php include __DIR__ . '/../footer.php'; ?>
