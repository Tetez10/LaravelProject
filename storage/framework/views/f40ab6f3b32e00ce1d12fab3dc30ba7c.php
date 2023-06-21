<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulaire de contact soumis</title>
</head>
<body>
    <h1>Formulaire de contact soumis</h1>
    
    <p>Nom : <?php echo e(htmlspecialchars($name)); ?></p>
    <p>E-mail : <?php echo e(htmlspecialchars($email)); ?></p>
    <p>Message : <?php echo e(htmlspecialchars($message)); ?></p>
</body>
</html>
<?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/mail/contact-form-submitted.blade.php ENDPATH**/ ?>