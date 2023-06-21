

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Add an category FAQ</h1>
        <form action="<?php echo e(route('faq-categories.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Name of category</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Entrez le nom de la catégorie">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        

        <!-- Formulaire de création de catégorie FAQ ici -->

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/faq-categories/create.blade.php ENDPATH**/ ?>