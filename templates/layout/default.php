<?php
echo $this -> Html->css("default.css",['block'=>true]);
?>


<head>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>

    <title><?= $this->fetch('title') ?></title>

    <!-- Bootstrap core CSS -->
    <?= $this->Html->css(['/vendor/bootstrap/css/bootstrap.min.css']) ?>

    <!-- Custom fonts for this template -->
    <?= $this->Html->css(['/vendor/fontawesome-free/css/all.min.css']) ?>
    <?= $this->Html->css(['/vendor/simple-line-icons/css/simple-line-icons.css']) ?>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <?= $this->Html->css(['landing-page.min.css']) ?>

    <!-- Anchors -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script(['/vendor/jquery/jquery.min.js']) ?>
</head>

<body>

<!-- Navigation -->
<?= $this->element('navbar/nav') ?>

<!-- Main Content -->
<main class="main">
    <div class="container-fluid">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>


<!-- Footer -->
<?= $this->element('footer/foot') ?>

<!-- Bootstrap core JavaScript -->
<?= $this->Html->script(['/vendor/bootstrap/js/bootstrap.bundle.min.js']) ?>
<?= $this->fetch('script') ?>
</body>

</html>
