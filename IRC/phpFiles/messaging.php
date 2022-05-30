<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IRChat</title>
        <link rel="stylesheet" href="style/chat.css">
        <link rel="stylesheet" href="style/login.css">
    </head>
    <body>      
        <?php
            session_start();        //Starting session for global savings of the variable;


            //______VARIABLE DECLARATION_________
            $topicChannel  = "";
            $userName  = "";  
            $msg  = "";
            $data  = "";
            
            if ($_POST)     //Data input via _POST method;
            {
                //Topic Name declaration;
                if (isset($_POST['topic']))
                { 
                    
                    $topicChannel = $_POST['topic'];
                    $_SESSION['topicChannel'] = $topicChannel;
                } 

                //Username declaration;
                if (isset($_POST['user']))
                {
                    
                    $userName= $_POST['user'];
                    $_SESSION['userName'] = $userName;
                } 
                //Message sent to the chat;
                if (isset($_POST['msg']))
                { 
                    
                    $msg = $_POST['msg'];
                }
            }

            // //Reading message text from the temporary-file and writing it
            // //in the final topic-file;
            // if (file_exists($_SESSION['topicChannel']. ".txt"))
            // {
            //     $data = file_get_contents($_SESSION['topicChannel']. "Temp.txt");       //Getting data from the temporary file;
            //     $file = fopen($_SESSION['topicChannel']. '.txt','a');       //Opening the final topic-file in append mode;
            //     fwrite($file, "\n". $data);         //Writing in the final topic-file the content of the temporary-file;
            //     fclose($file);
            // }
        ?>
        <nav>
            <span><?php print($topicChannel) ?></span>
        </nav>
        <div class="chat">
            <div class="screen">
                <?php
                    //______CHAT WINDOW SCRPIT______
                    //Reading data from the final topic-file;
                    
                    $topicChannel = $_SESSION['topicChannel'];      //Topic-file name declaration got by the session data;
                    $fileName = $_SESSION["topicChannel"]. ".txt";  //Declaration of the filename;

                    $file = fopen($fileName,"a+");                  //Opening the final topic-file in append mode;

                    if(filesize($fileName))
                    {
                        echo fread($file,filesize($fileName));      //Writing the content of the topic-file into the div;
                        fclose($file);                              //Closing the topic-file;

                        //Opening the temporary-file with the W method to remove all the data inside;
                        $temporaryFile = fopen($topicChannel. "Temp.txt", "w");
                        fclose($temporaryFile);
                    }

                ?>
                <script>
                    
                </script>
            </div>

            <div>
                <!-- The form used to write the message in the temporary-file using the "Server.php" file-->
                <form class="write-form" action="phpFiles/Server.php" method="post">
                    <input type="text" name="msg" class="input">                        <!--Message text area-->
                    <button type="submit" name="Scrittura" class="send-button">         <!--Send message button-->
                        <ion-icon name="paper-plane-outline"></ion-icon>                
                    </button>
                </form>
            </div>
        </div>
    </body>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>                <!--importing JQuery javascript library-->
    <script src="script.js"></script>                                                                       <!--javascript's page file-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>    <!--icon importing-->
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>             <!--icon importing-->
</html>