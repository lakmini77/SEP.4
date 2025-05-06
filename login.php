<?php include './components/header.php'; ?>
<?php include './components/top-menu.php'; ?>


<style>
    body {
        background-color: #f9f9f9;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    .login-container {
        background-color: #ffffff;
        padding: 3rem 2rem;
        border-radius: 1rem;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        width: 100%;
        max-width: 420px;
    }

    .login-container h2 {
        text-align: center;
        margin-bottom: 2rem;
        color: #333;
    }

    .login-container .ui.form .field > label {
        color: #444;
    }

    @media (max-width: 480px) {
        .login-container {
            padding: 2rem 1.5rem;
        }

        body {
            padding: 1rem;
        }
    }
	nav {
    background: linear-gradient(to right, #1e3c72, #2a5298); /* gradient from dark blue to a lighter blue */
    padding: 1rem 2rem;
}

</style>

<div class="login-container">
    <h2>Login to Your Account</h2>

    <?php
    $error_msg = "";

    if (!isset($_SESSION['user_id'])) {
        if (isset($_POST['submit'])) {
            $user_username = mysqli_real_escape_string($conn, trim($_POST['username']));
            $user_password = mysqli_real_escape_string($conn, trim($_POST['password']));

            if (!empty($user_username) && !empty($user_password)) {
                $query = "SELECT user_id, username FROM member WHERE username = '$user_username' AND password = SHA('$user_password')";
                $data = mysqli_query($conn, $query);

                if (mysqli_num_rows($data) == 1) {
                    $row = mysqli_fetch_array($data);
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));
                    setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
                    header('Location: ./admin/index.php');
                    exit();
                } else {
                    $error_msg = '<div class="ui warning message">Invalid Username or Password</div>';
                }
            } else {
                $error_msg = '<div class="ui warning message">Please enter both username and password</div>';
            }
        }
    }

    if (empty($_SESSION['user_id'])) {
        echo $error_msg;
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="ui form">
        <div class="field">
            <label for="username">Username</label>
            <div class="ui left icon input">
                <input type="text" name="username" id="username" placeholder="User Name">
                <i class="user icon"></i>
            </div>
        </div>
        <div class="field">
            <label for="password">Password</label>
            <div class="ui left icon input">
                <input type="password" name="password" id="password" placeholder="Password">
                <i class="lock icon"></i>
            </div>
        </div>

        <div style="margin-top: 1rem; margin-bottom: 1rem;">
            Don't have an account? <a href="signup.php">Sign Up</a>
        </div>

        <button name="submit" class="ui fluid large primary button" type="submit">Login</button>
    </form>

    <?php } else {
        echo('<div class="ui success message">You are logged in as <strong>' . $_SESSION['username'] . '</strong>.</div>');
    } ?>
</div>

<?php include './components/footer.php'; ?>
