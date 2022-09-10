<div class="opcion">
    <?php
    $widthBar = $porcentaje * 5;
    $estilo = "barra";
    if ($survey->getOptionSelected() == $lenguaje['opcion']) {
        $estilo = "seleccionado";
    }
    echo $lenguaje['opcion'];
    ?>
    <div class="<?php echo $estilo; ?>" style="<?= 'width: ' . $widthBar . 'px;' ?>"><?= $porcentaje . '%' ?></div>
</div>