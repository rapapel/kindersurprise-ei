<?php require_once '../../../config/config.php' ?>
<form action="<?php $base_url; ?>/app/Http/Controllers/takenController.php" method="post">
    <input type="hidden" name="action" id="action" value="updateStatus">
    <input type="hidden" name="id" id="id" value="<?php echo $taak['id']; ?>">
    <select name="status" id="status">
        <option value="0" <?php echo ($taak['status'] == '0') ? 'selected' : ''; ?>> To do
        </option>
        <option value="1" <?php echo ($taak['status'] == '1') ? 'selected' : ''; ?>> Doing
        </option>
        <option value="2" <?php echo ($taak['status'] == '2') ? 'selected' : ''; ?>> Done
        </option>
    </select>
    <input type="submit" value="Status bijwerken">
</form>

<!-- <form action="../../../app/Http/Controllers/tasksController.php" method="POST" class="task-form">
    <input type="hidden" name="action" id="action" value="updateStatus">
    <input type="hidden" name="id" id="id" value="<?php echo $taak['id']; ?>">
    <div class="tableStatus">
        <select id="status" name="status" class="status-select">
            <option value="0" <?php echo ($taak['status'] == '0') ? 'selected' : ''; ?>>To Do
            </option>
            <option value="1" <?php echo ($taak['status'] == '1') ? 'selected' : ''; ?>>Doing
            </option>
            <option value="2" <?php echo ($taak['status'] == '2') ? 'selected' : ''; ?>>Afgerond
            </option>
        </select>

    </div>
    <input type="submit" value="Verander" class="submit-btn">
</form> -->