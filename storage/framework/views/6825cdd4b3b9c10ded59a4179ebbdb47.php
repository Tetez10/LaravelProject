

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit Question</h1>

        <form action="<?php echo e(route('faq-questions.update', $faqQuestion->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control" required>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e($faqQuestion->category_id == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" name="question" id="question" class="form-control" value="<?php echo e($faqQuestion->question); ?>" required>
            </div>

            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" class="form-control" rows="5" required><?php echo e($faqQuestion->answer); ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/faq-questions/edit.blade.php ENDPATH**/ ?>