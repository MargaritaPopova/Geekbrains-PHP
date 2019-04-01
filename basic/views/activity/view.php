<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-29
 * Time: 11:10
 */

?>

<div class="row">
    <div class="col-md-12">
        <p>Название: <?=$model->title?></p>
        <p><img src="/images/<?=$model->file?>"></p>
        <hr>

        <?php foreach ($model->imageFiles as $image):?>
            <p><img src="/images/<?=$image?>"></p>
        <?php endforeach;?>

    </div>
</div>