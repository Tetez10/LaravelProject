

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Contact</h1>
        
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="<?php echo e(route('contact.send')); ?>">
            <?php echo csrf_field(); ?>
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/contact.blade.php ENDPATH**/ ?>