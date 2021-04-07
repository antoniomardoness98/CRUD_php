<?php include('db.php') ?>
<?php include('./includes/header.php') ?>
<?php include('./includes/nav.php') ?>

<div class="container p-4">
  <div class="row">
    
    <div class="col-md-4">

      <?php if(isset($_SESSION['message'])){ ?>
        <div class="alert <?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php session_unset(); } ?>

      <div class="card card-body">
        
        <form action="./save_task.php" method="POST">
          
          <div class="form-group">
            <input type="text" name="title" class="form-control mb-2" placeholder="Task Title" autofocus>
          </div>
          
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control mb-2" placeholder="Task Description"></textarea>
          </div>
          <input type="submit" class="btn btn-success" name="save_task" value="Save task">

        </form>
      </div>
    </div>
    
    <div class="col-md-8">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Created at</th>
              <th>Actions</th>
            </tr>
            <tbody>
              <?php
                $sql = "SELECT * FROM task";
                $result_task = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($result_task)){ ?>
                  <tr>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['create_at'] ?></td>
                    <td>
                      <a class="btn btn-secondary" href="./edit.php?id=<?php echo $row['id']?>" >
                        <i class="fas fa-marker"></i>
                      </a>
                      <a class="btn btn-danger" href="./delete_task.php?id=<?php echo $row['id']?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
            </tbody>
          </thead>
        </table>
    </div>

  </div>
</div>

<?php include('./includes/footer.php') ?>