<?php

include('./db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1 ){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $sql);
    
    $_SESSION['message'] = 'Task Update';
    $_SESSION['message_type'] = 'alert-warning';
    
    header("Location: index.php");
}

?>

<?php include("./includes/header.php") ?>
<?php include('./includes/nav.php') ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="./edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <h2 class="text-center text-warning rounded-2">Update!</h2>
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control mb-2" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control mb-2" placeholder="Update Description"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-warning" name="update">
                    Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>

