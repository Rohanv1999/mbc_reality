<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="<?= base_url('StripePayment/create'); ?>">
        <input type="hidden" value="20" name="amount">
        <button type="submit">submit</button>
    </form>
</body>

</html>