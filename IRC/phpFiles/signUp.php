<html>
	<head>
		<script type="text/javascript" src="libs/functions.js"> </script>
        <link rel="stylesheet" href="..\style\login.css">
	</head>
	<body>
    <?php
    
    if(isset($_POST["confirm"])) 
    {
        if ($_POST['confirm'] == "Sign up") 
        {
            $conn = mysqli_connect("localhost", "root", "", "rchat") or die();

            $qry = "SELECT * FROM utente WHERE nickName = '" . $_POST['nickName'] . "'";

            $res = mysqli_query($conn, $qry)	or die();
            
            $rig = mysqli_num_rows($res);

            if($rig == 0) 
            {
                $qry = "INSERT INTO Utente(nickName, userPassword)
                        VALUES ('". $_POST['nickName'] . "', '" . $_POST['userPassword'] ."');";
                        
                $res = mysqli_query($conn, $qry) or die();
                
                if ($res) 
                {
                    $msg = "<h3> Registazione avvenuta con successo </h3>
                            <h3> Per accerdere effettua il <a href='index.html'> login </a> </h3>";
                } 
                else 
                {
                    $msg = "<h3> Errore durante la registrazione, riprova </h3>";
                }
            } 
            else 
            {
                $msg = "<h3>L'utente " . $_POST['nickName'] . " è già registrato </h3>
                        <div class='container'>
                            <form class='login' action='signup.php' method='post' onsubmit='CtrlPW()' target='main'>
                                <div class='input-container'>
                                    <input type='text' name='nickName' class='input-form wh' placeholder=' ' required>
                                    <label class='input-name champagne'>Username</label>
                                </div>
                                <div class='input-container'>
                                    <input type='password' name='userPassword' class='input-form wh' placeholder=' ' id='pw1' onkeyup='IdemPW(this)' required>
                                    <label class='input-name champagne'>Password</label>
                                </div>
                                <input type='submit' name='confirm' value='Sign up' class='submit wh key mt2'>
                            </form>
                        </div>"; 
            }
        }
    echo $msg;
    }
    else 
    {
        print("<div class='container'>
                    <form class='login' action='signup.php' method='post' onsubmit='CtrlPW()' target='main'>
                        <div class='input-container'>
                            <input type='text' name='nickName' class='input-form wh' placeholder=' ' required>
                            <label class='input-name champagne'>Username</label>
                        </div>
                        <div class='input-container'>
                            <input type='password' name='userPassword' class='input-form wh' placeholder=' ' id='pw1' onkeyup='IdemPW(this)' required>
                            <label class='input-name champagne'>Password</label>
                        </div>
                        <input type='submit' name='confirm' value='Sign up' class='submit wh key mt2'>
                    </form>
                </div>");
    }

    ?>
	</body>
</html>

