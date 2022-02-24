<div class="menu">
    <?php
        if ($_SESSION ?? NULL) {
            echo "<input type='button' value='Logout' id='btLogout'><br>";
        }
    ?>
    <input type="button" value="Mostrar menu" id="btOptions">
    <div class="invisibility" id="options">
        <br>
        <label for="inColorBackground">Cor do fundo: </label>
        <input type="color" value="#ffffff" id="inColorBackground">
        <br>
        <label for="inColorText">Cor do texto: </label>
        <input type="color" value="#000000" id="inColorText">
        <br><br>
        <input type="button" value="Salvar" id="btSave">
        <br>
        <input type="button" value="Carregar" id="btLoad">
        <br>
        <input type="button" value="Resetar" id="btReset">
        <br><br>
        <span id="outLog"></span>
    </div>
</div>