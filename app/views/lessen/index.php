<?php require(APPROOT . '/views/includes/header.php'); ?>

<h3><?= $data['title'] ?></h3>



<table border='1'>
    <thead>
        <p>Auto van Instructeur: </p>
        <p>E-mail adres:</p>
        <p>Kenteken Auto:</p>

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