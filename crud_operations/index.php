<?php include("header.php"); ?>

<?php include("config.php"); ?>

<div class="box1">
    <h2>All Students</h2>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>

    </div>



<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
</tr>
</thead>
<tbody>

<?php


$query = "SELECT * from students";
$result = mysqli_query($connection, $query);

if(!$result){
    die("query Failed: " . mysqli_error());
}
else{
    while($row = mysqli_fetch_assoc($result)){
        ?>
<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['first_name'];?></td>
    <td><?php echo $row['last_name'];?></td>
    <td><?php echo $row['age'];?></td>
    <td><a href="update_page.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a></td>
    <td><a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
</tr>
        <?php
    }
}




?>



</tbody>
</table>



<?php 


if(isset($_GET['message'])){
    echo "<h6>" .$_GET['message'] ."</h6>";
}

?>




<?php 


if(isset($_GET['insert_msg'])){
    echo "<h6>" .$_GET['insert_msg'] ."</h6>";
}

?>



<?php 


if(isset($_GET['update_msg'])){
    echo "<h6>" .$_GET['update_msg'] ."</h6>";
}

?>



<?php 


if(isset($_GET['delete_msg'])){
    echo "<h6>" .$_GET['delete_msg'] ."</h6>";
}

?>

<!-- Modal -->
<form action="insert_data.php" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="bi bi-person-plus"></i> Add Student
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="f_name" class="form-label">First Name</label>
                        <input type="text" name="f_name" class="form-control" placeholder="Enter first name">
                    </div>
                    <div class="mb-3">
                        <label for="l_name" class="form-label">Last Name</label>
                        <input type="text" name="l_name" class="form-control" placeholder="Enter last name">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" name="age" class="form-control" placeholder="Enter age">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_students" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include("footer.php"); ?>