<?php session_start() ?>
<body>

    <?php require_once '../head.php'; ?>

    <div class="container">
        <h1>Maak een taak aan!</h1>

        <form action="<?php echo $base_url; ?>/task/tasksController.php?action=create" method="POST">
            <label for="titel">De taak:</label>
            <input type="text" name= 'titel' />
            <br>
            <label for="beschrijving">Wat is de taak:</label>
            <input type="text" name= 'beschrijving' />
            <br>
            <label for="user">Wie de taak moet doen:</label>
            <input type="text" name= 'user' />
            <br>
            <label for="afdeling">Welk sector van het bedrijf zit die?</label>
            <input type="text" name= 'afdeling' />
            <br>
            <label for="deadline">Wanner moest het af zijn:</label>
            <input type="date" name= 'deadline' />
            <br>
            <label for="status">Wat is de status van de taak:</label>
            <select name="status">
                    <option value="">Status van de taak</option>
                    <option value="ToDo">ToDo</option>
                    <option value="Doing">Doing</option>
                    <option value="Done">Done</option>
            </select>
            <br>
            <input type="hidden" name="action" value="create">
            <input type="submit" value="Create nieuwe taak">

        </form>
    </div>

</body>

</html>