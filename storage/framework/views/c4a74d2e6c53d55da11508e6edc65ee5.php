

<?php $__env->startSection('content'); ?>

<div class="container">

    <h1>All Users</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success" role="alert">
            User added successfully!
        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td>
                    <?php if($user->role == 1): ?>
                        Admin
                    <?php else: ?>
                        User
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php if(Auth::check() && Auth::user()->isAdmin()): ?>
        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary">Create User</a>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/index.blade.php ENDPATH**/ ?>