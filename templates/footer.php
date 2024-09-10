</td>

<td width="300px" class="sidebar">
	<div class="sidebarHeader">Меню</div>
	<ul>
		<li><a href="/">Книги</a></li>
		<li><a href="/authors">Авторы</a></li>
		<? if ($user !== null && $user->isAdmin()) : ?>
			<li><a href="/users">Пользователи</a></li>
			<li><a href="/issuingbooks">Учет выдачи</a></li>
		<? endif ?>
	</ul>
</td>
</tr>
<tr>
	<td class="footer" colspan="2">Все права защищены (c) Библиотека</td>
</tr>
</table>

</body>

</html>