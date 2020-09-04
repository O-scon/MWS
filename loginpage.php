<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Metro Raporlama</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Giriş Yap</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Kullanıcı Adı" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Şifre" id="password" required>
				<input type="submit" value="Giriş Yap">
			</form>
		</div>
	</body>
</html>