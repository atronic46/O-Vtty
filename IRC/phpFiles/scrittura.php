<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRChat</title>
    <meta content="Bada Beaulieu Castellani Nicolasi 5°B info" name="author">
    <link rel="stylesheet" href="style/chat.css">
  </head>
  <body>
<h1>IRChat MainScrittura</h1>

<?php
  $topicChannel  = $_GET['topic'];
  $userName  = $_GET['user'];  
  $msg  = "";
  $data  = "";
  
  print("Ciao <b>". $userName. "</b> benvenuto in: <b>". $topicChannel ."</b>");

  if ($_GET) {
    if (isset($_GET['topicChannel'])) { 
        $topicChannel = $_GET['topicChannel'];
    } /* if */
    if (isset($_GET['userName'])) { 
        $userName= $_GET['userName'];
    } /* if */
    if (isset($_GET['msg'])) { 
        $msg = $_GET['msg'];
    } /* if */
    
    $data = "\nThe user: $userName wrote<br>\n". $msg. "<br>\n-------------\n"; 
    
    file_put_contents($topicChannel. ".txt", $data);
  }  /* if */

?>

<!-- __________LETTURA__________ -->
<?php
    if ($_GET)
    {
      if (isset($_GET['topicChannel']))
      { 
          $topicChannel = $_GET['topicChannel'];
      } /* if */

      if (isset($_GET['userName']))
      { 
          $userName= $_GET['userName'];
      } /* if */

      if (isset($_GET['msg']))
      { 
          $msg = $_GET['msg'];
      } /* if */
      
      if (file_exists($topicChannel. ".txt"))
      {
          $data = file_get_contents($topicChannel. ".txt");
      }  /* if */  
    }  /* if */

?>

    <form action="phpFiles/Scrittura.php" method='GET'><br>
      <textarea name="msg" rows="10" cols="80" name="textarea">Questo è un testo di prova</textarea>      
      <input type="reset"><br>
      <input type="submit" value="Load Msg"><br>
    </form>
    <form action="lettura.php" method='GET'><br>
      UserName: <input name="userName" type="text"><br>
      #AshTag:  <input name="topicChannel" type="text"><br>
      <input type="reset"><br>
      <input type="submit" value="Read discussion"><br>
    </form>

  </body>
</html>