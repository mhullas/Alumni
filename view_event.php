<?php include 'admin/db_connect.php'; ?>
<?php
if (isset($_GET['id'])) {
    $event_id = intval($_GET['id']);
    $qry = $conn->query("SELECT * FROM events WHERE id = $event_id");
    if ($qry->num_rows > 0) {
        $event = $qry->fetch_assoc();
        $title = $event['title'];
        $schedule = $event['schedule'];
        $content = $event['content'];
        $banner = $event['banner'];

        $commits = $conn->query("SELECT user_id FROM event_commits WHERE event_id = $event_id");
        $cids = array();
        while ($row = $commits->fetch_assoc()) {
            $cids[] = $row['user_id'];
        }
    } else {
        echo "Event not found.";
        exit;
    }
}
?>
<style type="text/css">
	.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel, #imagesCarousel .carousel-inner, #imagesCarousel .carousel-item {
            height: 40vh !important;
            background: black;
        }
	#imagesCarousel{
		margin-left:unset !important ;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
		margin-top: unset;
		margin-bottom: unset;
	}
	#imagesCarousel img{
		width: calc(100%)!important;
		height: auto!important;
		/*max-height: calc(100%)!important;*/
		max-width: calc(100%)!important;
		cursor :pointer;
	}
	#banner{
		display: flex;
		justify-content: center;
	}
	#banner img{
		max-width: calc(100%);
		max-height: 50vh;
		cursor :pointer;
	}
	.overlay-bottom{
		margin: 1px;
	}
	<?php if (!empty($banner)): ?>
        header.masthead {
            background: url('admin/assets/uploads/<?php echo htmlspecialchars($banner); ?>');
            background-repeat: no-repeat;
            background-size: cover;
        }
        <?php endif; ?>
</style>

<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
    <header class="masthead">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white display-1 mb-5"><b><?php echo htmlspecialchars(ucwords($title)); ?></b></h1>
        </div>
    </header>
</div>

<section></section>
<div class="container">
    <div class="col-lg-12">
        <div class="card mt-4 mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" id="content">
                        <p>
                            <b><i class="fa fa-calendar"></i> <?php echo date("F d, Y h:i A", strtotime($schedule)); ?></b><br><br>
                            <?php echo html_entity_decode($content); ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr class="divider" style="max-width: calc(100%);"/>
                        <div class="text-center">
                            <?php if (isset($_SESSION['login_id'])): ?>
                                <?php if (in_array($_SESSION['login_id'], $cids)): ?>
                                    <span class="badge badge-primary">Committed to Participate</span>
                                <?php else: ?>
                                    <button class="btn btn-primary" id="participate" type="button">Participate</button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="path/to/jquery.min.js"></script>
<script src="path/to/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $('#participate').click(function() {
        if (confirm("Are you sure you want to commit to participate in this event?")) {
            $.ajax({
                url: 'admin/ajax.php?action=participate',
                method: 'POST',
                data: { event_id: <?php echo $event_id; ?> },
                success: function(resp) {
                    if (resp == 1) {
                        alert("Successfully committed to participate in this event.");
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    } else if (resp == 0) {
                        alert("You have already committed to this event.");
                    } else {
                        alert("An error occurred.");
                    }
                },
                error: function() {
                    alert("An error occurred while processing your request.");
                }
            });
        }
    });
});
</script>
</body>
</html>
