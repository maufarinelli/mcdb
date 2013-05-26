<h2>Ola, <?php echo $username; ?></h2>

<?php if(!$cdb): ?>

    <p>Crie agora o seu CDB</p>
    <form action="" method="post" name="cdb_creation">
        <div>
            <label for="titulo_cdb">Nome do CDB:</label>
            <input type="text" name="titulo_cdb" value="" />
        </div>
        <div>
            <label for="data_cdb">A data em que sera realizado:</label>
            <input type="text" name="data_cdb" value="" />
        </div>
        <div>
            <label for="endereco_cdb">O endereço:</label>
            <input type="text" name="endereco_cdb" value="" />
        </div>
        <div>
            <label for="hora_cdb">A hora:</label>
            <input type="text" name="hora_cdb" value="" />
        </div>
        <div>
            <label for="template_cdb">Qual template você quer utilizar:</label>
            <select name="template_cdb">
                <option value="">Escolha um template</option>
                <option value="01">Template 1</option>
                <option value="02">Template 1</option>
                <option value="03">Template 1</option>
            </select>
        </div>

        <input type="submit" name="cdb_submit" value="Cadastrar" />
    </form>
    
    <?php if($errors): ?>
        <p>Errors: </p>
        
        <?php foreach($errors as $errorKey => $errorVal): ?>
            <p style="color: red"><?php echo Kohana::message('errormessages',$errorKey.'.'.$errorVal[0]); ?></p>
        <?php endforeach; ?>
        
    <?php endif; ?>

<?php elseif($cdb): ?>
    
    <p>Parabens, voce criou o seu CDB - <?php echo $cdb; ?></p>
    
<?php endif; ?>