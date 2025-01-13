<?php 
include 'admin/db_connect.php'; 
?>

<style>
#portfolio .img-fluid {
    width: 100%;
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}

.gallery-list {
    cursor: pointer;
    border: unset;
    flex-direction: inherit;
}

.gallery-img, .gallery-list .card-body {
    width: 50%;
}

.gallery-img img {
    border-radius: 5px;
    min-height: 50vh;
    max-width: 100%;
}

span.highlight {
    background: yellow;
}

.carousel, .carousel-inner, .carousel-item {
    min-height: 100%;
}

header.masthead, header.masthead:before {
    min-height: 50vh !important;
    height: 50vh !important;
}

.row-items {
    position: relative;
}

.masthead, .masthead:before {
    min-height: 23vh !important;
    height: 23vh !important;
}
</style>

<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center my-5 py-5">
        <h1 class="text-white display-1 mb-5">Alumni's Posts</h1>
        <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
            
        </div>
        
    </div>
</div>

<div class="container mt-3 pt-2">
    <?php
    $query = "SELECT f.*, u.name FROM forum_topics f INNER JOIN users u ON u.id = f.user_id ORDER BY f.id DESC";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()):
        $desc = htmlspecialchars_decode($row['description']);
        $desc = str_replace(['<li>', '</li>'], ['', ','], $desc);
    
    ?>
    <div class="card Forum-list mb-3" data-id="<?php echo $row['id'] ?>">
        <div class="card-body">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-12">
                    <?php if ($_SESSION['login_id'] == $row['user_id']): ?>
                    <div class="dropdown float-right">
                        <a class="text-dark" href="javascript:void(0)" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item edit_forum" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Edit</a>
                            <a class="dropdown-item delete_forum" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Delete</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <h3><b class="filter-txt"><?php echo htmlspecialchars(ucwords($row['title'])) ?></b></h3>
                    <hr>
                    <p class="truncate filter-txt"><?php echo strip_tags($desc) ?></p>
                    <hr class="divider" style="max-width: 80%">
                    <span class="badge badge-info float-left px-3 pt-1 pb-1">
                        <b><i>Topic Created by: <span class="filter-txt"><?php echo htmlspecialchars($row['name']) ?></span></i></b>
                    </span>
                    <span class="badge badge-secondary float-left px-3 pt-1 pb-1 ml-2">
                        <b><i class="fa fa-comments"></i> <i> Comments</i></b>
                    </span>
                    <button class="btn btn-primary float-right view_topic" data-id="<?php echo $row['id'] ?>">View Topic</button>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<script>
    $('#new_forum').click(function(){
        uni_modal("New Topic", "manage_forum.php", 'mid-large');
    });

    $('.view_topic').click(function(){
        location.replace('index.php?page=view_forum&id=' + $(this).attr('data-id'));
    });

    $('.edit_forum').click(function(){
        uni_modal("Edit Topic", "manage_forum.php?id=" + $(this).attr('data-id'), 'mid-large');
    });

    $('.delete_forum').click(function(){
        _conf("Are you sure you want to delete this Topic?", "delete_forum", [$(this).attr('data-id')], 'mid-large');
    });

    function delete_forum(id) {
        start_load();
        $.ajax({
            url: 'admin/ajax.php?action=delete_forum',
            method: 'POST',
            data: {id: id},
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                }
            }
        });
    }

    $('#filter').keypress(function(e){
        if (e.which == 13) {
            $('#search').trigger('click');
        }
    });

    $('#search').click(function(){
        var txt = $('#filter').val().toLowerCase();
        start_load();
        if (txt === '') {
            $('.Forum-list').show();
            end_load();
            return;
        }
        $('.Forum-list').each(function(){
            var content = "";
            $(this).find(".filter-txt").each(function(){
                content += ' ' + $(this).text();
            });
            $(this).toggle(content.toLowerCase().includes(txt));
        });
        end_load();
    });
</script>
