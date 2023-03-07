
        <div class="form">
            <form action="php/add_book.php?StudentId=<?php echo $StudentId; ?>" method="POST">
            <?php
            if (isset($_SESSION['error'])) {?>
                <div class="error">
                    <?php echo $_SESSION['error']; ?>
                    <?php echo $_SESSION['error']="";?>
            </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) {?>
                <div class="success">
                    <?php echo $_SESSION['success']; ?>
                    <?php echo $_SESSION['success']="";?>
            </div>
            <?php } ?>
                <?php $studentName = mysqli_query($db,"SELECT*FROM tblstudents WHERE StudentId=$StudentId ");
                $result = mysqli_fetch_assoc($studentName);
                ?>
                <div class="form-header"><h4 class="header-line"><?php echo $result["StudentNames"]; ?></h4></div>
                <div class="form-control">
                    Book Title <input type="text" name="booktitle" required>
                    Book no <input type="text" name="bookno" required>
                </div>
                <div class="button">
                    <input type="submit" name="addbutton" value="ADD">
                </div>
            </form>
        </div>
