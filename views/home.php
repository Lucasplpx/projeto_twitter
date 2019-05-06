<div class="feed">
    Feeds...
</div>
<div class="rightside">
    <h4>Relacionamentos</h4>
    <div class="rs_meio"><?php echo $qt_seguidores ?> <br>Seguidores</div>
    <div class="rs_meio"><?php echo $qt_seguidos ?><br>Seguindo</div>
    <div class="clear:both"></div>

    <h4>Sugestões de amigos</h4>
    <table>
        <tr>
            <td width="80%"></td>
            <td></td>
        </tr>

        <?php foreach ($sugestao as $item):?>
        <tr>
            <td><?php echo $item['nome']?></td>
            <td>
                <a href="">Seguir</a>
            </td>
        </tr>
    <?php endforeach;?>
    </table>


</div>