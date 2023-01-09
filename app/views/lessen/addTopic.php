<?php require(APPROOT . '/views/includes/header.php'); ?>
<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT ?>/lessen/addTopic" method="post">
    <label for="topic">Mankement</label><br>
    <input type="text" name="topic" id="topic">
    <div class="topicError"><?= $data['topicError']; ?></div>
    <br>
    <input type="hidden" name="lesId" value="<?= $data['lesId']; ?>"><br>
    <input type="submit" value="Voer In">
</form>

<?php require(APPROOT . '/views/includes/footer.php'); ?>