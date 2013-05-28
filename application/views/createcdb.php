<h2>Ola, <?php echo $username; ?></h2>

<?php if(!$cdb): ?>

    <p>Crie agora o seu CDB</p>
    <form action="" method="post" name="cdb_creation">
        <div>
            <label for="titulo_cdb">Nome do CDB:</label>
            <input type="text" name="titulo_cdb" value="<?php if(isset($aPost['titulo_cdb'])) echo $aPost['titulo_cdb']; ?>" />
        </div>
        <div>
            <label for="dia">A data em que sera realizado: (dd/mm/aaaa)</label>
            <input type="text" name="dia" maxlength="2" value="<?php if(isset($aPost['dia'])) echo $aPost['dia']; ?>" />/
            <input type="text" name="mes" maxlength="2" value="<?php if(isset($aPost['mes'])) echo $aPost['mes']; ?>" />/
            <input type="text" name="ano" maxlength="4" value="<?php if(isset($aPost['ano'])) echo $aPost['ano']; ?>" />
        </div>
        <div>
            <label for="endereco_cdb">O endereço:</label>
            <input type="text" name="endereco_cdb" value="<?php if(isset($aPost['endereco_cdb'])) echo $aPost['endereco_cdb']; ?>" />
        </div>
        <div>
            <label for="hora">Hora:</label>
            <select name="hora">
                <?php for($i=0; $i<24; $i++): ?>
                    <option value='<?php echo $i < 10 ? '0'.$i : $i; ?>' <?php if(isset($aPost['hora']) && $aPost['hora'] == $i) echo 'selected' ?>><?php echo $i < 10 ? '0'.$i : $i; ?></option>
                <?php endfor; ?>
            </select>
            
            <label for="minuto">Minuto:</label>
            <select name="minuto">
                <?php for($i=0; $i<61; $i++): 
                        if($i%5 == 0): ?>  
                            <option value='<?php echo $i < 10 ? '0'.$i : $i; ?>' <?php if(isset($aPost['minuto']) && $aPost['minuto'] == $i) echo 'selected' ?>><?php echo $i < 10 ? '0'.$i : $i; ?></option>
                        <?php endif; ?>
                <?php endfor; ?>
            </select>
        </div>
        <div>
            <label for="template_cdb">Qual template você quer utilizar:</label>
            <select name="template_cdb">
                <option value="">Escolha um template</option>
                <option value="01" <?php if(isset($aPost['template_cdb']) && $aPost['template_cdb'] == '01') echo 'selected' ?>>Template 1</option>
                <option value="02" <?php if(isset($aPost['template_cdb']) && $aPost['template_cdb'] == '02') echo 'selected' ?>>Template 2</option>
                <option value="03" <?php if(isset($aPost['template_cdb']) && $aPost['template_cdb'] == '03') echo 'selected' ?>>Template 3</option>
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