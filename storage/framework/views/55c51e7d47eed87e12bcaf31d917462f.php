

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>List of FAQ Categories</h1>

        <?php if(Auth::check()): ?>
            <?php if(auth()->user()->isAdmin()): ?>
                <a href="<?php echo e(route('faq-categories.create')); ?>" class="btn btn-primary">Add a category</a>
                <a href="<?php echo e(route('faq-question.create')); ?>" class="btn btn-primary">Add Question</a>
            <?php endif; ?>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $faqCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($faqCategory->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('faq-categories.show', $faqCategory)); ?>" class="btn btn-primary">View</a>
                            <?php if(Auth::check()): ?>
                                <?php if(auth()->user()->isAdmin()): ?>
                                    <a href="<?php echo e(route('faq-categories.edit', $faqCategory)); ?>" class="btn btn-primary">Edit</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/faq-categories/index.blade.php ENDPATH**/ ?>