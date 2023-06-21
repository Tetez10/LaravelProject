

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Profiel</h1>
        
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" id="name" value="<?php echo e($user->name); ?>" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="birthday">Geboortedatum (Optioneel)</label>
                        <input type="date" name="birthday" id="birthday" value="<?php echo e($user->birthday); ?>" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="about">Over mij (Optioneel)</label>
                        <textarea name="about" id="about" class="form-control"><?php echo e($user->about); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="avatar">Avatar (Optioneel)</label>
                        <input type="file" name="avatar" id="avatar" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </form>
            </div>
            
            <div class="col-md-6">
                <h2>Wachtwoord wijzigen</h2>
                <form method="POST" action="<?php echo e(route('profile.password')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <div class="form-group">
                        <label for="current_password">Huidig wachtwoord</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password">Nieuw wachtwoord</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password_confirmation">Bevestig nieuw wachtwoord</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Wijzigen</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/profile.blade.php ENDPATH**/ ?>