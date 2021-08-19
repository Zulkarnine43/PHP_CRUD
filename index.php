<?php include 'layouts/header.php'; ?>

    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
            <?php
                echo "<span class='fs-6 fst-italic'>".$_SESSION['message']."</span>";
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>

    <!-- read - table -->
    <div class="container col-md-8 offset-md-2">
        <div class="row">
            <table class="table caption-top">
                <caption>Names and locations</caption>
                <thead class="table-success">
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $results->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td>
                                <a href="add.php?edit=<?php echo $row['id']; ?>"
                                    class="btn btn-success">Edit</a>
                                <a href="process.php?delete=<?php echo $row['id']; ?>" onClick="return confirm_delete()"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile;  ?>
                </tbody>       
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function confirm_delete() {
            return confirm('Are you sure?');
        }
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function() {
          $(".alert").remove();
        }, 3000);
      })
    </script>
    <?php include 'layouts/footer.php'; ?>