<h2>Ola, <?php echo $username; ?></h2>

<?php if(!$cdb): ?>

    <p>Crie agora o seu CDB</p>
    <form action="" method="post" name="cdb_creation">
        <div>
            <label for="title_cdb">Nome do CDB:</label>
            <input type="text" name="title_cdb" value="<?php if(isset($aPost['title_cdb'])) echo $aPost['title_cdb']; ?>" />
        </div>
        <div>
            <label for="day">A data em que sera realizado: (dd/mm/aaaa)</label>
            <input type="text" name="day" maxlength="2" value="<?php if(isset($aPost['day'])) echo $aPost['day']; ?>" />/
            <input type="text" name="month" maxlength="2" value="<?php if(isset($aPost['month'])) echo $aPost['month']; ?>" />/
            <input type="text" name="year" maxlength="4" value="<?php if(isset($aPost['year'])) echo $aPost['year']; ?>" />
        </div>
        <div>
            <label for="address_cdb">O endereço:</label>
            <input type="text" name="address_cdb" value="<?php if(isset($aPost['address_cdb'])) echo $aPost['address_cdb']; ?>" />
        </div>
        <div>
            <label for="hour">Hora:</label>
            <select name="hour">
                <?php for($i=0; $i<24; $i++): ?>
                    <option value='<?php echo $i < 10 ? '0'.$i : $i; ?>' <?php if(isset($aPost['hour']) && $aPost['hour'] == $i) echo 'selected' ?>><?php echo $i < 10 ? '0'.$i : $i; ?></option>
                <?php endfor; ?>
            </select>
            
            <label for="minute">Minuto:</label>
            <select name="minute">
                <?php for($i=0; $i<61; $i++): 
                        if($i%5 == 0): ?>  
                            <option value='<?php echo $i < 10 ? '0'.$i : $i; ?>' <?php if(isset($aPost['minute']) && $aPost['minute'] == $i) echo 'selected' ?>><?php echo $i < 10 ? '0'.$i : $i; ?></option>
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