<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Paulo Ricardo">
    <meta name="description" content="<?php echo $this->getDescription(); ?>">
    <meta name="keywords" content="<?php echo $this->getKeywords(); ?>">
    <title><?php echo $this->getTitle(); ?></title>
    <link rel="icon" href="<?php echo DIRIMG.'logo.png'; ?>">
    <link rel="sortcut icon" href="<?php echo DIRIMG.'logo.png'; ?>">

    <!-- LINK CSS BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Início do Head -->
    <?php echo $this->addHead(); ?>
    <!-- Fimo do Head -->
</head>

<body>
    <!-- Início do Header -->
    <?php echo $this->addHeader(); ?>
    <!-- Fim do Header -->

    <!-- Início do Main -->
    <?php echo $this->addMain(); ?>
    <!-- Fim do Main -->

    <!-- Início do Footer -->
    <?php echo $this->addFooter(); ?>
    <!-- Fim do Footer -->
</body>

</html>