<?php require_once(__DIR__ . '/../../../config/conn.php');
require_once(__DIR__ . '../../../../app/Http/Controllers/takenController.php'); ?>
<form action="../../../app/Http/Controllers/takenController.php" method="POST" class="task-form">
    <!-- Verbergen van de actie parameter -->
    <input type="hidden" name="action" id="action" value="updateStatus">

    <!-- De taak ID die geüpdatet moet worden -->
    <input type="hidden" name="id" id="id" value="<?php echo $taak['id']; ?>">

    <!-- Dropdown voor status -->
    <div class="tableStatus">
        <select id="status" name="status" class="status-select">
            <option value="0" <?php echo ($taak['status'] == '0') ? 'selected' : ''; ?>>To Do</option>
            <option value="1" <?php echo ($taak['status'] == '1') ? 'selected' : ''; ?>>Doing</option>
            <option value="2" <?php echo ($taak['status'] == '2') ? 'selected' : ''; ?>>Done</option>
        </select>
    </div>

    <!-- Submit knop om de status te veranderen -->
    <input type="submit" value="Status bijwerken" class="submit-btn">
</form>
