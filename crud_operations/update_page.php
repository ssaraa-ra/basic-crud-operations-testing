<?php include("header.php"); ?>
<?php include("config.php"); ?>

<?php
// Fetch student details
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    $query = "SELECT * FROM students WHERE `id` = '$id' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            die("No student found with the given ID.");
        }
    }
}
?>

<?php
// Update student details
if (isset($_POST['update_students'])) {
    if (isset($_GET['id_new'])) {
        $idnew = mysqli_real_escape_string($connection, $_GET['id_new']);
    } else {
        die("Invalid request.");
    }

    $fname = mysqli_real_escape_string($connection, $_POST['f_name']);
    $lname = mysqli_real_escape_string($connection, $_POST['l_name']);
    $age   = mysqli_real_escape_string($connection, $_POST['age']);

    $query = "UPDATE `students` 
              SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' 
              WHERE `id` = '$idnew'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?update_msg=You have successfully updated the data.');
        exit;
    }
}
?>

<form action="update_page.php?id_new=<?php echo htmlspecialchars($id); ?>" method="POST">
    <div class="modal-body">
        <div class="mb-3">
            <label for="f_name" class="form-label">First Name</label>
            <input type="text" id="f_name" name="f_name" class="form-control" 
                   placeholder="Enter first name" 
                   value="<?php echo htmlspecialchars($row['first_name']); ?>">
        </div>
        <div class="mb-3">
            <label for="l_name" class="form-label">Last Name</label>
            <input type="text" id="l_name" name="l_name" class="form-control" 
                   placeholder="Enter last name" 
                   value="<?php echo htmlspecialchars($row['last_name']); ?>">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="text" id="age" name="age" class="form-control" 
                   placeholder="Enter age" 
                   value="<?php echo htmlspecialchars($row['age']); ?>">
        </div>
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>

<?php include("footer.php"); ?>
