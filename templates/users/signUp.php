<?php include __DIR__ . '/../header.php'; ?>
<div style="text-align: center;">
   <h1>Регистрация</h1>
   <?php if (!empty($error)) : ?>
      <div style="background-color: #FF77FF;padding: 5px;margin: 15px"><?= $error ?></div>
   <?php endif; ?>
   <form action="/users/register" method="post">
      <label>Login <input type="text" name="login" value="<?= $_POST['login'] ?? '' ?>"></label>
      <br><br>
      <label>Email <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>"></label>
      <br><br>
      <label>Полное имя <input type="text" name="fullName" value="<?= $_POST['fullName'] ?? '' ?>"></label>
      <br><br>
      <label>Телефон +7 <input type="tel" name="phone" value="<?= $_POST['phone'] ?? '' ?>"></label>
      <br><br>
      <label>Адрес <input type="text" name="address" value="<?= $_POST['address'] ?? '' ?>"></label>
      <br><br>
      <label>Паспорт <input type="text" name="passportNum" value="<?= $_POST['passportNum'] ?? '' ?>"></label>
      <br><br>
      <label>День рождения <input type="date" name="birthday" value="<?= $_POST['birthday'] ?? '' ?>"></label>
      <br><br>
      <label>Пароль <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"></label>
      <br><br>
      <input type="submit" value="Зарегистрироваться">
   </form>
</div>
<?php include __DIR__ . '/../footer.php'; ?>