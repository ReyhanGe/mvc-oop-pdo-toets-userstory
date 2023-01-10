<?php require(APPROOT . '/views/includes/header.php'); ?>
<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT ?>/lessen/addTopic" method="post">
    <label for="mankement">Mankement</label><br>
    <input type="text" name="mankement" id="mankement">
    <div class="topicError"><?= $data['topicError']; ?></div>
    <br>
    <input type="hidden" name="lesId" value="<?= $data['lesId']; ?>"><br>
    <input type="submit" value="Voer In">
</form>

<?php require(APPROOT . '/views/includes/footer.php'); ?>