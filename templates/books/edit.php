<?php include __DIR__ . '/../header.php'; ?>
    <h1>Редактирование книги</h1>
    <?php if(!empty($error)): ?>
        <div style="color: #FF77FF;"><?= $error ?></div>
    <?php endif; ?>
    <form action="/books/<?= $book->getId() ?>/edit" method="post">
        <label for="name">Название книги</label><br>
        <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? $book->getName() ?>" size="50"><br>
        <br>
        <label for="description">Описание книги</label><br>
        <textarea name="description" id="description" rows="10" cols="80"><?= $_POST['text'] ?? $book->getDescription() ?></textarea><br>
        <br>
        <input type="submit" value="Обновить">
    </form>
<?php include __DIR__ . '/../footer.php'; ?>