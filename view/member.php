
<!DOCTYPE html>
<html>
    <?php include('templates/header.php') ?>
    
    <section class="container grey-text">
        <h4 class="center">Add to School</h4>
        <form class="white" method="POST">
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
            <div class="red-text"><?php echo $errors['name']; ?></div>
            <label>School:</label>
            <select class = "school-dropdown" name="school">
                <option value="" disabled selected>Select a school</option>
                <?php foreach ($schools as $school) { ?>
                    <option value="<?php echo $school['name']; ?>"><?php echo $school['name']; ?></option>
                <?php } ?>
            </select>
            <div class="red-text"><?php echo $errors['school']; ?></div>
            <div class="center">
                <input class="btn brand z-depth-0" type="submit" name="submit" value="submit">
            </div>
        </form>
    </section>
    <?php include('templates/footer.php') ?>
</body>
</html>
