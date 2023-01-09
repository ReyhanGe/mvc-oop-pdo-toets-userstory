<?php require(APPROOT . '/views/includes/header.php'); ?>

<h3><?= $data['title'] ?></h3>



<table border='1'>
    <thead>
        <p>Auto van Instructeur: </p>
        <p>E-mail</p>
        <th>Type</th>
        <th>Kenteken</th>
        <th>Km Stand Toevoegen</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>

<?php require(APPROOT . '/views/includes/footer.php'); ?>