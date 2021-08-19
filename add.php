<?php include 'layouts/header.php'; ?>

<!-- insert - form -->
<div class="container mt-3">
    <div class="row">
        <div class="container col-md-6 offset-md-3">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter your location">
                </div>
                <div class="mb-3">
                    <?php if($update == true): ?>
                        <button type="submit" class="btn btn-success" name="update">Update</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>  

