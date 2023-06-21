

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Articles')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

             

                    <?php if(Auth::user() && Auth::user()->isAdmin()): ?>
                        <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-primary">Create Article</a>
                    <?php endif; ?>

                    <div class="articles">
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="article">
                                <h2><?php echo e($article->title); ?></h2>
                                <img src="<?php echo e(asset('storage/cover_images/' . $article->cover_image)); ?>" alt="Cover Image" style="max-width: 500px">
                                <p><?php echo e($article->content); ?></p>
                                <p>Publishing Date: <?php echo e($article->publishing_date); ?></p>
                                <?php if(Auth::user() && Auth::user()->isAdmin()): ?>
                                <a href="<?php echo e(route('articles.edit', $article->id)); ?>" class="btn btn-secondary">Edit</a>
                                <?php endif; ?>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/home.blade.php ENDPATH**/ ?>