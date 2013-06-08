<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User form</title>
</head>
<body>
    <form action="" method="post" name="user_sign_in">        
        <div>   
            <label for="firstname">Nome:</label>
            <input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>" />
        </div>
        <div>
            <label for="lastname">Sobrenome:</label>
            <input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>" />
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
        </div>
        <div>
            <label for="password">Senha:</label>
            <input type="text" name="password" value="" />
        </div>
        <div>    
            <label for="phone">Telefone:</label>
            <input type="text" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" />
        </div>
        <div>
            <label for="address">Endereço:</label>
            <input type="text" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>" />
        </div>
        <div>
            <label for="city">Cidade:</label>
            <input type="text" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>" />
        </div>
        <div>
            <label for="province">Estado:</label>
            <input type="text" name="province" value="<?php if(isset($_POST['province'])) echo $_POST['province']; ?>" />
        </div>
        
        <input type="submit" name="user_submit" value="Cadastrar" />
    </form>
    
    <?php if($aErrors): ?>
        <p>Errors: </p>
        
        <?php foreach($aErrors as $errorKey => $errorVal): ?>
            <p style="color: red"><?php echo Kohana::message('errormessages',$errorKey.'.'.$errorVal[0]); ?></p>
        <?php endforeach; ?>
        
    <?php endif; ?>
</body>
</html>