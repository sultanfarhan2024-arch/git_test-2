<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login || Farlexo || Fast, Affordable & Reliable E-Commerce Online</title>

    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <div class="container">

        <form method="post">

            <h1>Login</h1>

            <span>Email Address</span>

            <input
                class="form-input"
                type="email"
                placeholder="Enter your email"
                name="email"
                required
            >

            <span>Password</span>

            <input
                class="form-input"
                type="password"
                placeholder="Enter your password"
                name="password"
                required
            >

            <ul>
                <li>
                    <input
                        class="checkbox"
                        type="checkbox"
                        value="remember-me"
                        name="checkbox"
                    >
                    Remember Me
                </li>

                <li>
                    <a href="">Forgot Password?</a>
                </li>
            </ul>

            <input
                class="sub-btnClass"
                type="submit"
                value="login"
                name="sub-btn"
            >

            <p id="para">_______or signing with_______</p>

            <div class="other-method-to-signing-account">

                <a href="">
                    <img src="../images/logos/google.jpg">
                </a>

                <a href="">
                    <img src="../images/logos/facebook.jpg">
                </a>

            </div>

            <span class="new-account-box">
                Don't have an account?
                <a href="">Create new</a>
            </span>

        </form>

    </div>


    <?php


if (isset($_POST['sub'])) {

    $server = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($server, $username, $password, "farlexo");

    if (!$conn) {
        die("Failed Network: " . mysqli_connect_error());
    }

    $aa = $_POST['textn'];
    $ab = $_POST['em'];

    $serverRoot = "INSERT INTO `farlexo_form_data` (`email`, `password`)
                   VALUES ('$ab', '$aa')";

    if ($conn->query($serverRoot) == true) {
        echo "Successfully Sent";
    } else {
        echo "ERROR: " . mysqli_error($conn);
    }

    $conn->close();
}

?>


    <script src=""></script>

</body>

</html>