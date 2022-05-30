<html>
	<head>
		<script type="text/javascript" src="libs/functions.js"> </script>
		<!-- <link rel="stylesheet" href="style/main.css">
        <link rel="stylesheet" href="style/login.css"> -->
	</head>
	<body>
    <?php
        if (isset($_POST['confirm']) && $_POST['confirm'] == "Login")
        {
            $username = $_POST['user'];
            $password = $_POST['password'];
            

            $con = mysqli_connect("localhost", "root", "", "rchat") or die();

            $qry = "SELECT * FROM utente WHERE nickName = '$username';";

            $res = mysqli_query($con, $qry)	or die();
            
            $cnt = mysqli_num_rows($res);

            if($cnt > 0)
            {
                $row = mysqli_fetch_assoc($res);
                
                if ($row['userPassword'] == $password)
                {
                    session_start();
                    
                    $_SESSION['userName'] = $row['nickName'];
                    header('location: ..\client.html');
                }
                else
                {
                    print("<h3> Password non corretta </h3>");
                }
            }
            else
            {
                print("<h3> Username non valido </h3>");
            }
            mysqli_close($con);
        }

    ?>
	</body>
</html>