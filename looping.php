<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Below is an example of while loop</h3>
    <?php $name=  "shyam";$x=1?>
    <?php while($x<=5):?>
    <p>Hello <?php echo $name;?>, Number <?php echo $x;?></p>
    <?php $x++?>
    <?php endwhile;?>

</body>

</html>