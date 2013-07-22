<nav>
    <ul>
        <li><a href="">Banho e toilete</a></li>
        <li><a href="">Higiene e Cuidados</a></li>
        <li><a href="">Hora da refeiçao</a></li>
        <li><a href="">Mamadeiras, Chupeta e Acessorios</a></li>
        <li><a href="">Brinquedos</a></li>
        <li><a href="">Quarto</a></li>
        <li><a href="">Passeio</a></li>
        <li><a href="">Roupinhas</a></li>
        <li><a href="">Atividades e Brincadeiras</a></li>
        <li><a href="">Equipamentos para o bebê</a></li>
        <li><a href="">Segurança em casa</a></li>
        <li><a href="">Para o carro</a></li>
        <li><a href="">Carrinho de bebê</a></li>
        <li><a href="">Fraldas</a></li>
        <li><a href="">Para a mamae</a></li>
    </ul>
</nav>
<div>
    <?php print_r($aProductsBainToilette); ?>
    <?php foreach($aProductsBainToilette as $key => $val): ?>
    <div style='width:200px; float:left; margin-right:20px; border: 1px solid #ccc;'>
        <a href="<?php echo $val->links->link[1]->attributes()->url . "#precos"; ?>"><img src='<?php echo $val->thumbnail->attributes()->url; ?>'
        <h3><?php echo $val->productName; ?></h3>
        <p>A partir de <?php echo $val->priceMin; ?></p>
        <button>Saiba mais</button></a>
    </div>
    <?php endforeach; ?>
        
</div>
