<?php 
include 'admin/db_connect.php'; 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 $topic = $conn->query("SELECT *,u.name from forum_topics f inner join users u on u.id = f.user_id  where f.id = ".$_GET['id']);
 foreach($topic->fetch_array() as $k=>$v){
 	if(!is_numeric($k))
 		$$k = $v;
 }
?>

<style>
    .jumbotron {
    position: relative;
    padding: 2rem;
    background-color: #343a40; /* Adjust background color if needed */
}

.page-title {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.page-title .divider {
    margin: 1rem 0; /* Adjust margin if needed */
}

.badge-primary {
    font-size: 1rem; /* Adjust font size if needed */
    background-color: #007bff; /* Adjust badge color if needed */
}

#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.gallery-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}
.gallery-img,.gallery-list .card-body {
    width: calc(50%)
}
.gallery-img img{
    border-radius: 5px;
    min-height: 50vh;
    max-width: calc(100%);
}
span.hightlight{
    background: yellow;
}
.carousel,.carousel-inner,.carousel-item{
   min-height: calc(100%)
}
header.masthead,header.masthead:before {
        min-height: 50vh !important;
        height: 50vh !important
    }
.row-items{
    position: relative;
}
.masthead{
        min-height: 23vh !important;
        height: 23vh !important;
    }
     .masthead:before{
        min-height: 23vh !important;
        height: 23vh !important;
    }

</style>
<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center my-5 py-5">
        <h1 class="text-white"><?php echo htmlspecialchars($title); ?></h1>
        <br>
        <br>
        <br>
        <br>
        <div class="mx-auto mb-5" style="width: 100%; max-width: 6000px;">
            <div class="page-title text-center">
                <hr class="divider my-4" />
                <div class="row justify-content-center">
                    <span class="badge badge-primary px-3 pt-1 pb-1">
                        <b><i>Topic Created by: <?php echo htmlspecialchars($name); ?></i></b>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3 pt-2">
    <div class="card mb-4">
        <div class="card-body">
	            <?php echo html_entity_decode($description) ?>
        <hr class="divider">
        </div>
    </div>
  	<?php 
  	// echo "SELECT f.*,u.name,u.email FROM forum_comments f inner join users u on u.id = f.user_id where f.topic_id = $id order by f.id asc";
  	$comments = $conn->query("SELECT f.*,u.name,u.username FROM forum_comments f inner join users u on u.id = f.user_id where f.topic_id = $id order by f.id asc");
  	?>
    <div class="card mb-4">
    		<div class="col-lg-12">
    			
    		
    			
    		
    		</div>
    			
    	</div>
    </div>
    
</div>
    


<script>
    // $('.card.gallery-list').click(function(){
    //     location.href = "index.php?page=view_gallery&id="+$(this).attr('data-id')
    // })
	$('.jqte').jqte();

    $('#new_forum').click(function(){
        uni_modal("New Topic","manage_forum.php",'mid-large')
    })
    $('.edit_comment').click(function(){
        uni_modal("Edit Comment","manage_comment.php?id="+$(this).attr('data-id'),'mid-large')
    })
    $('.view_topic').click(function(){
        uni_modal("Career Opportunity","view_Forums.php?id="+$(this).attr('data-id'),'mid-large')
    })

    $('#search').click(function(){
        var txt = $(this).val()
        start_load()
        $('.Forum-list').each(function(){
            var content = $(this).text()
            if((content.toLowerCase()).includes(txt.toLowerCase) == true){
                $(this).toggle('true')
            }else{
                $(this).toggle('false')
            }
        })
        end_load()
    })
    $('#manage-comment').submit(function(e){
    e.preventDefault();
    start_load();
    $.ajax({
        url: 'admin/ajax.php?action=save_comment',
        method: 'POST',
        data: $(this).serialize(),
        success: function(resp){
            if (resp == 1) {
                alert_toast("Data successfully saved.", 'success');
                setTimeout(function(){
                    location.reload();
                }, 1000);
            } else {
                alert_toast("Failed to save data.", 'danger');
            }
        }
    });
});

    $('.delete_comment').click(function(){
        _conf("Are you sure to delete this comment?","delete_comment",[$(this).attr('data-id')],'mid-large')
    })

    function delete_comment($id){
        start_load()
        $.ajax({
            url:'admin/ajax.php?action=delete_comment',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully deleted",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)

                }
            }
        })
    }

</script>