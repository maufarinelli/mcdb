<?php 
    $logged = Session::instance()->get('logged');
    $logged_id = Session::instance()->get('logged_id');
?>

<?php if(!isset($logged) || !isset($logged_id)): ?>
    <a href="<?php echo Route::url('registration'); ?>">Register</a>
    <span> | </span>
    <?php echo $login_form; ?>
<?php endif; ?>

<?php if(isset($logged) && isset($logged_id)): ?>
    <a href="<?php echo Route::url('login', array('action' => 'logout')); ?>">Logout</a>
<?php endif; ?>