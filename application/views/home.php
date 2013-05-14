<div>
    <h1>CDB - Home Page</h1>
</div>

<?php 
    $logged = Session::instance()->get('logged');
    $logged_id = Session::instance()->get('logged_id');
?>
<?php if(isset($logged) && isset($logged_id)): ?>
<div>
    <p>Para criar um CDB, <a href='<?php echo Route::url('createcdb') ?>'>clique aqui</a>.</p>
</div>
<?php endif; ?>