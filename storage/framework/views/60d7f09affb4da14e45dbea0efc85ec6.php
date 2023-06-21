

<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if($category->questions->isEmpty()): ?>
            <p>No questions in this category.</p>
        <?php else: ?>
            <ul class="list-group">
                <?php $__currentLoopData = $category->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <h5><?php echo e($question->question); ?></h5>
                        <p class="mb-0"><?php echo e($question->answer); ?></p>
                        <?php if($question->admin_answer): ?>
                            <p class="mb-0">Admin's Answer: <?php echo e($question->admin_answer); ?></p>
                        <?php else: ?>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(auth()->user()->isAdmin()): ?>
                                    <form action="<?php echo e(route('faq-questions.answer', $question->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="admin_answer">Admin's Answer</label>
                                            <textarea name="admin_answer" id="admin_answer" rows="3" class="form-control"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->isAdmin()): ?>
                                <div class="btn-group" role="group">
                                    <a href="<?php echo e(route('faq-questions.edit', $question->id)); ?>" class="btn btn-primary">Edit</a>
                                    <form action="<?php echo e(route('faq-questions.destroy', $question->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        <a href="<?php echo e(route('faq-categories.index')); ?>" class="btn btn-primary">Back to categories</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/faq-categories/show.blade.php ENDPATH**/ ?>