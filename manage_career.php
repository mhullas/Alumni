<?php include 'admin/db_connect.php'; ?>

<?php
if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM careers WHERE id=" . $_GET['id'])->fetch_array();
    foreach ($qry as $k => $v) {
        $$k = $v;
    }
}
?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<form id="manage-career">
    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
    <div class="form-group">
        <label for="job_title">Job Title</label>
        <input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo isset($job_title) ? $job_title : '' ?>" required>
    </div>
    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="form-control" id="company" name="company" value="<?php echo isset($company) ? $company : '' ?>" required>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="<?php echo isset($location) ? $location : '' ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" required><?php echo isset($description) ? $description : '' ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $('#manage-career').submit(function(e) {
        e.preventDefault();
        start_load();
        $.ajax({
            url: 'admin/ajax.php?action=save_career',
            method: 'POST',
            data: $(this).serialize(),
            success: function(resp) {
                if (resp == 1) {

                    setTimeout(function() {
                        location.reload();
                    }, 1200);
                }
            }
        });
    });

    function alert_toast(message, type) {
        alert(message); // Replace with actual toast notification implementation
    }

    function start_load() {
        // Implement loading spinner or overlay if needed
    }
</script>
