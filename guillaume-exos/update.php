<?php
    include 'functions_custom.php';

    $pdo = pdo_connect_mysql();

    if (isset($_GET['id'])) {
        if (!empty($_POST)) {
            
            $id = $_GET['id'];

            $first_name = isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : '';
            $last_name = isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : '';
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
            $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
            $age = isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '';

            $pdo_stmt = $pdo->prepare(' UPDATE students
                                        SET id = ?, 
                                            first_name = ?, 
                                            last_name = ?, 
                                            email = ?, 
                                            phone = ?, 
                                            age = ? 
                                        WHERE id = ?');

            $pdo_stmt->execute([$id, $first_name, $last_name, $email, $phone, $age, $_GET['id']]);
        }

        $pdo_stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
        $pdo_stmt->execute([$_GET['id']]);
        $student = $pdo_stmt->fetch(PDO::FETCH_ASSOC);

    } else {
            exit('Pas d\'ID spécifié');
    }
?>

<?php echo template_header('Update'); ?>

    <div class="content update">
        <h2>Update student #<?php echo $student['id'] ?>'s data :</h2>

        <form action="update.php?id=<?php echo $student["id"] ?>" method="POST" style="display:block">
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $student['first_name']?>" id="first_name">
            </div>
            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $student['last_name']?>" id="last_name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $student['email']?>" id="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $student['phone']?>" id="phone">
            </div>
            <div class="form-group">
                <label for="title">Age</label>
                <input type="text" class="form-control" name="age" value="<?php echo $student['age']?>" id="age">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>

<?php echo template_footer(); ?>