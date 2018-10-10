<?php 
// Database 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//connect to database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!mysqli_set_charset($conn, "utf8")) {
    exit();
}

$sql = "SELECT `posts`.`post_user`, `posts`.`message` FROM `posts`;";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <!-- modern meta tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- web title -->
    <title>Let's POST!!</title>

    <!-- custom css -->
    <link rel="stylesheet" href="font/font.css">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>
    <nav class="navbar">
        <div class="nav-logo">
            <a href="index.php" class="logo">Let's POST!!</a>
        </div>
        <div class="nav-item">
            <!-- <span class="user">ยังไม่ได้ลงชื่อเข้าใช้</span> -->
        </div>
    </nav>

    <div class="container">
        <div class="head">
            <h1>
                Welcome to
                <a href="index.php" class="logo">Let's POST!!</a>
            </h1>
            <span>บริการฝากข้อความสำหรับคุณ "เผื่อคนที่คุณชอบ ผ่านมาเห็นพอดี"</span>
            <a href="login.php" class="button b-wide">
                <span>โพสต์ข้อความ</span>
                <span>(ต้องเข้าสู่ระบบทุกครั้ง)</span>
            </a>
        </div>
        <div class="card-area">
            <!-- this card for loop display message -->
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    ?>
            <div class="card">
                <div class="card-data">
                    <p>
                        <?php echo $row['message']; ?>
                    </p>
                    <span>
                        <?php echo $row['post_user']; ?>
                    </span>
                </div>
            </div>
            <?php }} 
            mysqli_close($conn);
            ?>

        </div>
    </div>
</body>

</html>