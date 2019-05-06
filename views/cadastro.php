<h2>Tela de Cadastro</h2>
<form action="" method="post">
    Nome: <br>
    <input type="text" name="nome"> <br><br>

    E-mail: <br>
    <input type="text" name="email"> <br><br>

    Senha: <br>
    <input type="password" name="senha"> <br><br>

    <input type="submit" value="Cadastrar"> 

    <?php
    if(!empty($aviso)){
        echo $aviso;
    }
    ?>

</form>