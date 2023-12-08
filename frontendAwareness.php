<div class="awareness-page" id="frontendAwareness">
    <div class="section-1">
        <h1>Awareness</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ex molestiae quos! Porro in et dolores eum pariatur molestias error natus harum dicta consequuntur, facere libero voluptate obcaecati eaque minus.
        Magnam modi tempora quos ullam laudantium doloremque eveniet neque repudiandae amet quisquam laborum eum quae ex aliquid veniam eligendi placeat, debitis omnis? Consequuntur libero similique ea quidem in alias quaerat.
        Consequatur maxime voluptas recusandae id quia blanditiis eos itaque numquam eveniet in quidem provident quod fugit quaerat, dolor sed magni dolores repellat voluptatibus architecto vitae voluptatum quis suscipit. Maiores, nemo?
        Quis sequi, magni facilis similique earum quo vitae, quam, dolor a repellat aliquam ducimus eum ut. Nihil molestias fugiat adipisci voluptate, recusandae sit qui illum provident numquam laudantium similique saepe!
        Maxime ex error est hic, quod fugiat ad delectus quo esse aut aperiam tempora animi necessitatibus nihil. Blanditiis, corrupti molestias eligendi expedita perspiciatis accusantium dolore aliquam eveniet consectetur fugit dolorum!</p>
    </div>

    <div class="section-2">
        <form action="./frontendModel/send_awareness.php" method="POST">
            <label for="">Name:</label>
            <?php if(isset($_SESSION['username'])) { ?>
            <div class="name">
                <input type="text" value="<?= $_SESSION['firstname'] ?>" name="firstname" id="" placeholder="Firstname..." required>
                <input type="text" value="<?= $_SESSION['middlename'] ?>" name="middlename" id="" placeholder="Middlename...">
                <input type="text" value="<?= $_SESSION['lastname'] ?>" name="lastname" id="" placeholder="Lastname..." required>
                <input type="text" value="<?= $_SESSION['suffix'] ?>" name="suffix" id="suffix" placeholder="Suffix...">
            </div>
            <?php } else { ?>
                <div class="name">
                    <input type="text" name="firstname" id="" placeholder="Firstname..." required>
                    <input type="text" name="middlename" id="" placeholder="Middlename...">
                    <input type="text" name="lastname" id="" placeholder="Lastname..." required>
                    <input type="text" name="suffix" id="suffix" placeholder="Suffix...">
                </div>
            <?php } ?>


            <label for="">Details:</label>
            <textarea name="details" id="" placeholder="Details..." required></textarea>
            <?php if(isset($_SESSION['username'])) {?>
                <button type="button" class="awarenessBtn">Submit</button>
            <?php } else { ?>
                <button type="button" class="fakeAwarenessBtn"><a href="./login_page.php">Submit</a></button>
            <?php } ?>

            <?php if(isset($_SESSION['username'])) { ?>
            <input type="hidden" value="<?= $_SESSION['house_no'] ?>" name="house_no" id="" placeholder="House no...">
            <input type="hidden" value="<?= $_SESSION['street'] ?>" name="street" id="" placeholder="Street...">
            <input type="hidden" value="<?= $_SESSION['subdivision'] ?>" name="subdivision" id="" placeholder="Subdivision...">
            <?php } ?>

            <div class="confirmAwareness">
                <div class="main-awarenessConfirmation">
                    <h1>Are you sure?</h1>
                    <div class="btns">
                        <button class="cancelAwareness">Cancel</button>
                        <button type="submit" class="proceed">OK</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>