<?php
$error = validation_errors();
if (!empty($error)): ?>
<div class="alert alert-error">
    <?php print $error; ?>
</div>
<?php endif; ?>
<?php
print form_open('members/login', array('class' => 'well')) .
    form_label('Email:', 'email') .
    form_input(array('name' => 'email', 'value' => set_value('email', ''))) .
    form_label('Password:', 'password') .
    form_password('password');
?>
<span class="help-block">Don't have any account? please <?php print anchor('members/register', 'register new account'); ?>.</span>
<?php
print form_submit(
    array(
        'name' => 'login_submit', 
        'value' => 'Login',
        'class' => 'btn',
    )
);
?>
<span> or request your password?</span>
<?php form_close(); ?>
