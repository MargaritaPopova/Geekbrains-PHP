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

        <p><img src="/images/<?=$model->imageFiles[0]?>"></p>
    </div>
</div>