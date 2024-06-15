<?php
session_start();
if(isset($_SESSION["login"])) {
    header("Location: ../");
    exit;
}

require '../feature/function.php';
if(isset($_COOKIE['id_user']) && isset($_COOKIE['username'])) {
    $id = $_COOKIE['id_user'];
    $username = $_COOKIE['username'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
    $row = mysqli_fetch_assoc($result);

    if($row['username'] === hash('sha256', $username)) {
        $_SESSION['login'] = true;
    }
}

if (isset($_POST['login'])) {
    $user_data = $_POST['user_data'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$user_data' OR no_telepon = '$user_data'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];

            if(isset($_POST['remember'])) {
                $id = $row['id_user'];
                $username = $row['username'];
                setcookie('id', $id, time() + 3600, '/');
                setcookie('user', hash('sha256', $username), time() + 3600, '/');
            }
            header("Location: ../");
            exit;
        } 
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Ke Aswa</title>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container-form {
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 16px rgba(0, 0, 0, .25);
        }

        h1 {
            color: #776B5D;
        }

        input {
            border: 2px solid #776B5D;
            padding: 5px;
            border-radius: 8px;
        }

        ::placeholder {
            color: #776B5D;
        }

        ul {
            list-style-type: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding-right: 40px;
        }

        button {
            margin-top: 10px;
            padding: 8px;
            border-radius: 10px;
            background-color: #776B5D;
            color: white;
            border: 2px solid #776B5D;
        }

        button:hover {
            background-color: white;
            color: #776B5D;
            border: 2px solid #776B5D;
            transition: .2s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="m-3" id="backButton">
        <img src="img/arrow-left.svg" alt="" id="back">
    </div>
    <div class="container">
        <div class="container-form">
            <h1>LOGIN</h1>
            <form action="" method="post">
                <ul>
                    <li><input type="text" placeholder="Email atau Telepon" id="user_data" name="user_data">
                    </li>
                    <li><input type="password" placeholder="Password" id="password" name="password"></li>
                    <li><input type="checkbox" name="remember" id="remember">Ingat Saya</li></li>
                </ul>
                <button type="submit" name="login">Masuk</button>
            </form>
            <p>Belum memiliki akun? Buat <a href="register.php">disini</a></p>
        </div>
        <?php if (isset($error)) : ?>
            <p id="error-message" style="color: red; font-style: italic;">Username Tidak ditemukan, pastikan anda mengisi dengan benar!</p>
        <?php endif; ?>
    </div>

    <script type="text/javascript">
        const backButton = document.getElementById("backButton");

        backButton.addEventListener('click', () => {
            window.history.back()
        })

        const errorMessage = document.getElementById("error-message");

        // If the error message exists, hide it after 1 second
        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.display = "none";
            }, 1000);
        }
    </script>
</body>

</html>