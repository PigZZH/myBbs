<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>

<?php if ($if == $content) { ?>
    <?php echo $content; ?>
<?php } else { ?>
    <?php echo $content; ?>
<?php } ?>

<?php if (is_array($array)) {
    foreach ($array AS $val) { ?>
        <?php if (is_array($val)) {
            foreach ($val AS $key => $value) { ?>
                <br/>
                <?php echo $key; ?>:<?php echo $value; ?><br/>
            <?php }
        } ?>
    <?php }
} ?>
<a href="index.php">退出</a>
<?php echo $title; ?>=<?php echo $content; ?>
</body>
</html>