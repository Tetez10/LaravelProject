<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    <p>Name: <?php echo e(htmlspecialchars($name)); ?></p>
    <p>Email: <?php echo e(htmlspecialchars($email)); ?></p>
    <p>Message: <?php echo e(htmlspecialchars($message->getBody())); ?></p>
</body>
</html>
<?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/emails/contact-form-submitted.blade.php ENDPATH**/ ?>