<?php
    if (isset($_POST['buscar'])) {
        $buscar = $_POST['buscar'];
    } else {
        $buscar = '';
    }
    ?>
<div>
    <form action="index.php" method="post">
        <Input type="text" name="buscar" placeholder="Valor" value="<?php echo $buscar ?>"></Input>
        <button class="btn success" type="submit">Buscar</button>
    </form>
</div>