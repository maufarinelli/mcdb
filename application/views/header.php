<?php $logged = Session::instance()->get('logged');
    if(!isset($logged)): ?>
    <a href="<?php echo Route::url('registration'); ?>">Register</a>
    <span> | </span>
    <?php echo $login_form; ?>
<?php endif; ?>

<?php $logged = Session::instance()->get('logged');
    if(isset($logged)): ?>
    <a href="<?php Session::instance()->delete('logged'); ?>">Logout</a>
<?php endif; ?>