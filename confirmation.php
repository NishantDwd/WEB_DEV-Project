<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Confirmation</title>
    <link rel="stylesheet" href="confirmation.css">
    <style>
        body {
    background-color: hwb(187 14% 36% / 0.822);
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;

    margin: 0;
}

.container {
    text-align: center;
}

.confirmation-box {
    background-color: #7c7ef9;
    border-radius: 10px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    padding: 20px;
    height: 60vh;
    width: 60vh;
}

.success-icon {
    color: #36d365;
}

.confirmation-heading {
    font-size: 24px;
    margin: 10px 0;
}

.confirmation-text {
    font-size: 16px;
    margin: 10px 0;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #36d365;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #2cb250;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="confirmation-box">
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 13.5l4.5 4.5L19 6.51" fill="none"/><path d="M0 0h24v24H0V0z" fill="none"/>
                </svg>
            </div>
            <h2 class="confirmation-heading">Congratulations!</h2>
            <p class="confirmation-text">You have successfully signed up. Please proceed to login.</p>
            <a href="Login.php" class="btn">Login</a>
        </div>
    </div>
</body>
</html>
