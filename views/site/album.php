<?php
use yii\helpers\Html;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 40%;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container {
            padding: 2px 16px;
        }
        </style>
    </head>
    <body>
        <?
        foreach($albums as $album)
        {
         ?>
            <div class="card">
             <div class="container">
             <?= Html::beginForm(['album-category/view-album'], 'post') ?>
                <input type="hidden" id="aid" value="<?= $album->aid; ?>"> 
                <input type="submit" value="<?= $album->aname; ?>">
                 <?= Html::endForm() ?>
            </div> 
            </div>
            <?
        }
        ?>
    </body>
</html>