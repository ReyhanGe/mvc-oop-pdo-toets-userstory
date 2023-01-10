<?php require(APPROOT . '/views/includes/header.php'); ?>

<h3><?= $data['title'] ?></h3>

<h4> <?= $data['rows1']; ?></h4> <br>

<table border='1'>
    <thead>
        <th>Datum</th>
        <th>Mankement</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>
<br>
<a href="<?= URLROOT; ?>/lessen/topicslesson/{$info->Id}">
    <input type="button" value=" Voer In">
</a> 
   
</form>

<?php require(APPROOT . '/views/includes/footer.php'); ?>