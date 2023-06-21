

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Edit Article')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('articles.update', $article->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label for="title"><?php echo e(__('Title')); ?></label>
                            <input id="title" type="text" class="form-control" name="title" value="<?php echo e($article->title); ?>" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="cover_image"><?php echo e(__('Cover Image')); ?></label>
                            <input id="cover_image" type="file" class="form-control" name="cover_image">
                            <?php if($article->cover_image): ?>
                                <img src="<?php echo e(asset('storage/cover_images/' . $article->cover_image)); ?>" alt="Cover Image">
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="content"><?php echo e(__('Content')); ?></label>
                            <textarea id="content" class="form-control" name="content" rows="5" required><?php echo e($article->content); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="publishing_date"><?php echo e(__('Publishing Date')); ?></label>
                            <input id="publishing_date" type="date" class="form-control" name="publishing_date" value="<?php echo e($article->publishing_date); ?>" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                        </div>
                    </form>

                    <form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/edit.blade.php ENDPATH**/ ?>