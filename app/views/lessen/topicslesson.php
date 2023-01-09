<?php require(APPROOT . '/views/includes/header.php'); ?>
<h3><?= $data['title'] ?></h3>


<table border='1'>
    <thead>
        <p>Kenteken</p> <p> Type</p>
        <th>
        Mankement
        </th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<br>
<a href="<?= URLROOT; ?>/lessen/addTopic/<?= $data['lesId']; ?>">
    <input type="button" value=" Voer In">
</a>

<?php require(APPROOT . '/views/includes/footer.php'); ?>