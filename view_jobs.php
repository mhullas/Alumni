<?php include 'admin/db_connect.php'; ?>
<?php
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM careers WHERE id=".$_GET['id'])->fetch_array();
    foreach($qry as $k => $v){
        $$k = $v;
    }
}
?>
<div class="container-fluid">
    <p>Company: <b><large><?php echo ucwords($company) ?></large></b></p>
    <p>Job Title: <b><large><?php echo ucwords($job_title) ?></large></b></p>
    <p>Location: <i class="fa fa-map-marker"></i> <b><large><?php echo $location ?></large></b></p>
    <hr class="divider">
    <div class="description-container">
        <?php echo html_entity_decode($description); ?>
    </div>
</div>
<div class="modal-footer display">
    <div class="row">
        <div class="col-md-12">
            <button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<style>
	/* Ensure proper wrapping and overflow handling */
.description-container {
    white-space: normal; /* Allows text to wrap normally */
    word-wrap: break-word; /* Breaks long words to fit within the container */
    overflow-wrap: break-word; /* Ensures overflow is handled */
    hyphens: auto; /* Automatically adds hyphens for better text wrapping */
    padding: 15px; /* Optional padding for better spacing */
    background-color: #f9f9f9; /* Optional background color for better readability */
    border-radius: 5px; /* Optional rounded corners */
}

p {
    margin: unset;
}

#uni_modal .modal-footer {
    display: none;
}

#uni_modal .modal-footer.display {
    display: block;
}

	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none;
	}
	#uni_modal .modal-footer.display {
		display: block;
	}
</style>
<script>
	$('.text-jqte').jqte();
	$('#manage-career').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=save_career',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
</script>