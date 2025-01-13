<?php include 'admin/db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM forum_topics where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
<form action="" id="manage-forum">
    <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>" class="form-control">
    <div class="row form-group">
        <div class="col-md-8">
            <label class="control-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo isset($title) ? $title : '' ?>">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label class="control-label">Description</label>
            <textarea name="description" class="text-jqte"><?php echo isset($description) ? $description : '' ?></textarea>
        </div>
    </div>
	<button type="submit" class="btn btn-primary">Save</button>
</form>

</div>

<script>
$('.text-jqte').jqte(); // Ensure jqte() is correctly initialized

$('#manage-forum').submit(function(e){
    e.preventDefault(); // Prevent default form submission

    start_load(); // Show loading animation or spinner

    $.ajax({
        url: 'admin/ajax.php?action=save_forum', // Adjust URL as needed
        method: 'POST',
        data: $(this).serialize(), // Serialize form data
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Data successfully saved.", 'success');
                setTimeout(function() {
                    location.reload(); // Reload the page after saving
                }, 1000);
            } else {
                alert_toast("An error occurred. Please try again.", 'error');
            }
            end_load(); // Hide loading animation
        },
        error: function() {
            alert_toast("An error occurred. Please try again.", 'error');
            end_load(); // Hide loading animation
        }
    });
});

</script>