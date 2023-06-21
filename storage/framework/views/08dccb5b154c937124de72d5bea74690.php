

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit the category FAQ</h1>

        <form action="<?php echo e(route('faq-categories.update', $faqCategory->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Champ de formulaire pour le nom de la catégorie -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo e($faqCategory->name); ?>" required>
            </div>

            <!-- Bouton de soumission du formulaire -->
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

        <form action="<?php echo e(route('faq-categories.destroy', $faqCategory->id)); ?>" method="POST" class="d-inline">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie FAQ ?')">Supprimer</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/faq-categories/edit.blade.php ENDPATH**/ ?>