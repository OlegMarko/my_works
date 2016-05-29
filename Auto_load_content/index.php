<?php 
    require_once 'config.php';
    
    $query = "SELECT * FROM `content` ORDER BY `date` DESC LIMIT 20";
    $query = mysqli_query($connect, $query);
    
    $news = array();
    while ($row = mysqli_fetch_array($query)) {
        $news[] = $row;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Auto load content</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" />
    </head>
    <body>
        <div class="container">
            <h1>Auto load content</h1>
            <hr />
            <div id="news">
                <?php foreach ($news as $value) { ?>
                    <p>
                        <?=$value['text'];?>
                        <br />
                        <i><b><?=$value['date'];?></b></i>
                    </p>
                    <hr/>
                <?php } ?>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
    </body>
</html>