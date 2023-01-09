<?php require(APPROOT . '/views/includes/header.php'); ?>
<h3><?= $data['title'] ?></h3>


<table border='1'>
    <thead>
        <th>
            Kilometerstand
        </th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<br>
<a href="<?= URLROOT; ?>/lessen/addTopic/<?= $data['lesId']; ?>">
    <input type="button" value=" Invoeren Kilometerstand">
</a>

<?php require(APPROOT . '/views/includes/footer.php'); ?>