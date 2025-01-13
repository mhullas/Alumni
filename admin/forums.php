<?php include('db_connect.php');?>

<div class="container-fluid">
    <style>
        input[type=checkbox] {
            /* Double-sized Checkboxes */
            -ms-transform: scale(1.5); /* IE */
            -moz-transform: scale(1.5); /* FF */
            -webkit-transform: scale(1.5); /* Safari and Chrome */
            -o-transform: scale(1.5); /* Opera */
            transform: scale(1.5);
            padding: 10px;
        }

        .card {
            overflow: hidden; /* Ensures that content doesn't overflow out of the card */
        }

        .table {
            width: 100%; /* Ensures the table takes up the full width of its container */
            table-layout: fixed; /* Ensures table columns don’t expand beyond their container */
        }

        .table td, .table th {
            white-space: nowrap; /* Prevents text from wrapping in cells */
        }

        .truncate {
            text-overflow: ellipsis; /* Adds an ellipsis (...) for overflowed text */
            overflow: hidden;
            white-space: nowrap;
        }

        img {
            max-width: 100px;
            max-height: 150px;
        }
    </style>

    <div class="col-lg-12">
        <div class="row mb-4 mt-4">
            <div class="col-md-12">
                <!-- Content can go here -->
            </div>
        </div>
        <div class="row">
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Forum List</b>
                        <span class="">
                            <button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" id="new_forum">
                                <i class="fa fa-plus"></i> New
                            </button>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-condensed table-hover">
                            <colgroup>
                                <col width="5%">
                                <col width="20%">
                                <col width="30%">
                                <col width="20%">
                                <col width="25%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="">Topic</th>
                                    <th class="">Description</th>
                                    <th class="">Created By</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $Forum = $conn->query("SELECT f.*, u.name FROM forum_topics f INNER JOIN users u ON u.id = f.user_id ORDER BY f.id DESC");
                                while($row = $Forum->fetch_assoc()):
                                    $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
                                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                                    $desc = strtr(html_entity_decode($row['description']), $trans);
                                    $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
                    
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td class="">
                                        <p><b><?php echo ucwords($row['title']) ?></b></p>
                                    </td>
                                    <td class="">
                                        <p class="truncate"><b><?php echo $desc ?></b></p>
                                    </td>
                                    <td class="">
                                        <p><b><?php echo ucwords($row['name']) ?></b></p>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-outline-primary view_forum" target="_blank" data-id="<?php echo $row['id'] ?>">View</a>
                                        <button class="btn btn-sm btn-outline-primary edit_forum" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger delete_forum" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>  
</div>

<script>
    $(document).ready(function(){
        $('table').dataTable();
    });

    $('.view_forum').click(function(){
        uni_modal("All Posts","view_forums.php?id="+$(this).attr('data-id'),'mid-large');
    });

    $('#new_forum').click(function(){
        uni_modal("New Entry","manage_forum.php",'mid-large');
    });

    $('.edit_forum').click(function(){
        uni_modal("Manage Job Post","manage_forum.php?id="+$(this).attr('data-id'),'mid-large');
    });

    $('.delete_forum').click(function(){
        _conf("Are you sure to delete this topic?","delete_forum",[$(this).attr('data-id')],'mid-large');
    });

    function delete_forum($id){
        start_load();
        $.ajax({
            url:'ajax.php?action=delete_forum',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully deleted",'success');
                    setTimeout(function(){
                        location.reload();
                    },1500);
                }
            }
        });
    }
</script>
