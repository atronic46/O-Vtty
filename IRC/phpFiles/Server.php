<?php
    session_start();

    function Scrittura()
    {
        if ($_SESSION)
        {
            if (isset($_SESSION['topicChannel']))
            { 
                $topicChannel = $_SESSION['topicChannel'];
            }
            if (isset($_SESSION['userName']))
            { 
                $userName= $_SESSION['userName'];
            }
            if (isset($_POST['msg']))
            { 
                $msg = $_POST['msg'];
            }
            $data = "<div class='msg-container'>"
                        ."<div class='name'>"
                            .$userName. 
                        "</div>
                        <div class='msg'>".
                            $msg.
                        "</div>".
                        "<div class='date'>".
                            date("h:i:s") 
                        . "</div>
                    </div>"; 
            file_put_contents($topicChannel. "Temp.txt", $data);
        } 
    }

    Scrittura();

    header('Location: client.php')

?>