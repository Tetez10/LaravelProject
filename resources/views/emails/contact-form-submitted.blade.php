<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    <p>Name: {{ htmlspecialchars($name) }}</p>
    <p>Email: {{ htmlspecialchars($email) }}</p>
    <p>Message: {{ htmlspecialchars($message->getBody()) }}</p>
</body>
</html>
