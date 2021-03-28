<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kourintchoute-Lab08 <?php if (!empty($pageTitle)) echo '-' .$pageTitle; ?></title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
<div class="container">
    <header>
    <?php if (isset($error) && strlen($error)) : ?>
        <div class="alert alert-danger text-center">
            <p><?php echo $error; ?></p>
        </div>
    <?php endif; ?>
    <?php if (isset($successMessage) && strlen($successMessage)) :?>
        <div class="alert alert-success text-center">
            <p><?php echo $successMessage; ?></p>
        </div>
    <?php endif; ?>
    </header>
    <main>

