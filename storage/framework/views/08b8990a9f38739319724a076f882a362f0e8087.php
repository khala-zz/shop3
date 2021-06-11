<?php if(\Session::has('flash_message')): ?>
    <div class="alert alert-success"><?php echo \Session::get('flash_message'); ?></div>
<?php endif; ?>

<?php if(\Session::has('flash_error')): ?>
    <div class="alert alert-danger"><?php echo \Session::get('flash_error'); ?></div>
<?php endif; ?>

<?php if(\Session::has('flash_warning')): ?>
    <div class="alert alert-warning"><?php echo \Session::get('flash_warning'); ?></div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/includes/flash_message.blade.php ENDPATH**/ ?>