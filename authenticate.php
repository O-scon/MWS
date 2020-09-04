<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// veritabanı bağlantım burda (Localhost üzerinden bağlantı yapiyorum)
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// herhangi bir hata alırsam bunu ekrana basmasını sağlıyorum
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// if koşuluyla verilerin gönderilip gönderilmediğini kontrol ettiriyorum
if ( !isset($_POST['username'], $_POST['password']) ) {
	// gönderdiğim veriler alınamadığında basacağı hata
	exit('Kullanıcı Adı ve Şifre alanlarını doldurun!');
}


if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Verileri kaydediyorum ki eğer böyle bir kayıt varsa veritabanında göreyim
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Üyelik var parolayı denetle
        if ($_POST['password'] === $password) {
            // Giriş başarılı üye giriş yaptı
            // Kullanıcı giriş yaptıktan sonra giriş başarılı mesajı aldıktan sonra index sayfasına yönlendiriliyor
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            echo ' Hoşgeldiniz ' . $_SESSION['name'] . '! Giriş Başarılı 3 Saniye içerisinde yönlendirileceksiniz.';
            header("Refresh: 4; url=index.php");
        } else {
            
            echo 'Kullanıcı Adı veya Şifre yanlış!';
        }
    } else {
        
        echo 'Kullanıcı Adı veya Şifre yanlış!';
    }
    

	$stmt->close();
}
?>