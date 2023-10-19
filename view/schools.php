
    <!DOCTYPE html>
    <html>
        <?php include('templates/header.php') ?>
        
        <section class="container grey-text">
            <h4 class="center">View Schools</h4>
            <form class="white" method="POST">
                <select class = "school-dropdown" name="school">
                    <option value="" disabled selected>Select a school</option>
                    <?php foreach ($schools as $school) { ?>
                        <option value="<?php echo $school['name']; ?>"><?php echo $school['name']; ?></option>
                    <?php } ?>
                </select>
                <div class="center">
                    <input class="btn brand z-depth-0" type="submit" name="submit" value="submit">
                </div>

            </form>
        </section>
        <?php include('templates/footer.php') ?>
    </body>
    </html>
