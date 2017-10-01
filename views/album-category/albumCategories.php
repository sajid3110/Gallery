<?php
use yii\helpers\Html;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?
        foreach($model as $album)
        {
            echo $model->cid . '<br>';
        }
        ?>
    </body>
</html>