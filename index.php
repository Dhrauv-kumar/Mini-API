<!-- Register Email:dkdeveloper15.com -->

<?php
date_default_timezone_set("Asia/Kolkata");
$result = "";

if (isset($_GET['action'])) {

    try {

        if ($_GET['action'] == "greet") {

            $name = urlencode($_GET['name']);

            $json = file_get_contents("http://localhost/mini-api/api/greet.php?name=$name");

            $data = json_decode($json, true);

            $result = '
            <div class="result-card">

                <div class="profile-icon">👤</div>

                <h2>'.$data["message"].'</h2>
              <p>📅 '.date("d M Y").'</p>
              <p>⏰ '.date("h:i A").'</p>
                <div class="info-box">
                    <div class="icon">✅</div>
                    <div>
                        <small>Status</small>
                        <h3>'.$data["status"].'</h3>
                    </div>
                </div>

                <div class="info-box">
                    <div class="icon">🎓</div>
                    <div>
                        <small>Course</small>
                        <h3>'.$data["course"].'</h3>
                    </div>
                </div>

            </div>';
        }

        if ($_GET['action'] == "tips") {

            $json = file_get_contents("http://localhost/mini-api/api/list.php");

            $data = json_decode($json, true);

            $result = '
            <div class="result-card">

            <h2>📚 Study Tips</h2>

            <ul>';

            foreach ($data["tips"] as $tip) {

                $result .= "<li>✅ ".htmlspecialchars($tip)."</li>";

            }

            $result .= "</ul></div>";
        }

    } catch (Exception $e) {

        $result = "<div class='error'>Something went wrong.</div>";

    }

}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mini API Project</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="card">

<h1> Mini API Project</h1>
    <div class="logo">
      🚀
    </div>
       <p class="subtitle">
        <h2> Learn, Build and Grow with APIs ✨</h2>   
       </p>
        <p class="date">📅 <?php echo date("d M Y"); ?></p>
        <p class="time">⏰ <?php echo date("h:i A"); ?></p>
<form method="GET">

    <div class="input-box">

        <span>👨‍🎓</span>

              <input type="text" name="name" placeholder="Enter Your Name" required>

    </div>

<div class="buttons">

<button type="submit" name="action" value="greet">

🎉 Get Greeting

</button>

<button type="submit" name="action" value="tips">

📚 Show Study Tips

</button>

</div>

</form>

<?php echo $result; ?>
       <div class="footer">
           💗 Made with PHP • JSON • API   <br><br>
            👨‍💻 Developed by Dhrauv Kumar
        </div> 
        </div>
      </div>
   </body>
</html>