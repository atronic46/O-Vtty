<html>
	<head>
		<script type="text/javascript" src="libs/functions.js"> </script>
		<link rel="stylesheet" href="style/main.css">
        <link rel="stylesheet" href="style/login.css">
	</head>
	<body>
    <?php
    session_start();

    if(isset($_POST["confirm"])) 
    {
        $conn = mysqli_connect("localhost", "root", "", "rchat") or die();

        $qry = "SELECT * FROM topic WHERE nomeTopic = '" . $_POST['topicName'] . "';";

        $res = mysqli_query($conn, $qry)	or die();
        
        $rig = mysqli_num_rows($res);

        if($rig == 0) 
        {
            $qry = "INSERT INTO topic(nomeTopic, password, host, nMaxUtenti, privato)
                    VALUES ('". $_POST['topicName'] . "', '" . $_POST['topicPassword'] ."', '" . $_SESSION['userName'] ."', '" . $_POST['maxUsers'] ."', 1);";

            $res = mysqli_query($conn, $qry) or die();
            
            if ($res) 
            {
                $msg = "<h3> Registazione del topic avvenuta con successo </h3>
                        <h3> Accedi da <a href='messaging.php'> qui </a> </h3>";
            } 
            else 
            {
                $msg = "<h3> Errore durante la registrazione, riprova </h3>";
            }
        } 
        else 
        {
            $msg = "<h3> Questo topic è già registrato </h3>"; 
        }
        mysqli_close($conn);
    echo $msg;
    }
    else 
    {
        //INSERIMENTO DEI DATI VIA HTML FORM
        print("<div class='container'>
                    <form class='login' action='createTopic.php' method='post' onsubmit='CtrlPW()' target='main'>
                        <div class='input-container'>
                            Nome del topic:<input type='text' name='topicName' placeholder=' ' required>
                            <!--<label class='input-name'>topicname</label>-->
                        </div>
                        <div class='input-container'>
                            Massimo utenti:<input type='number' name='maxUsers' placeholder=' '>
                            <!-- <label class='input-name'>max user</label>-->
                        </div>
                        <div class='input-container'>
                            Password:<input type='password' name='topicPassword' placeholder=' '>
                            <!-- <label class='input-name'>password</label>-->
                        </div>
                        <input type='submit' name='confirm' value='crea topic' class='submit wh key mt2'>
                    </form>
                </div>");
                        
    }
    

    ?>
	</body>
</html>