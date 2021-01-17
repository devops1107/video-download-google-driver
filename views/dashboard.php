<?php
get_header();
$limit = 10;
if(isset($page)){
    $page = $page  - 1;
} else {
    $page = 0;
}
$offset = $limit * $page;
$sqlt = "select count(*) as total from links";
$total = $conn->query($sqlt);
$total = $total->fetch_assoc()['total'];
$pages = ceil($total / $limit);
$sql = "select * from links where created_by = '" . $_SESSION['api'] . "' order by id desc limit $limit offset $offset";
$result = $conn->query($sql);
?>
<?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<table class="table table-hover fixed">
    <thead>
    <tr>
        <th class="no">No</th>
        <th  class="name">Name</th>
        <th  class="file">File</th>
        <th class="links">Links</th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
<tbody>
<?php
if($result->num_rows > 0) {
    $no = 1;
    $pagination = "";
    while ($row = $result->fetch_assoc()) { ?>
        <tr id="file-<?= $row['id']; ?>">
            <td class="no"><?= $no; ?></td>
            <td class="name"><?= urldecode($row['name']); ?></td>
            <td class="file"><a href="<?= $row['file']; ?>" title="<?= $row['file']; ?>"><?= $row['file']; ?></a></td>
            <td class="links"><a href="/v/<?= $row['short']; ?>">Video</a> | <a href="/d/<?= $row['short']; ?>">Download</a></td>
            <td class="actions"><a href="#<?= $row['short']; ?>" data-toggle="modal" data-target="#delete" data-title="<?= urldecode($row['name']); ?>" data-key="<?= $row['id']; ?>">Delete</a></td> </tr>
        <?php $no++;
    }
    $pagebef = $page - 3;
    $pagelimit = $page + 5;
    $lastpage = $pages - 3;
    $pagenow = $page + 1;
    for ($i = 1; $i <= $pages; $i++){
        if($i == $pagenow){
            $pagination .= "<li class=\"page-item active\"><span class=\"page-link\">".$i."<span class=\"sr-only\">(current)</span></span>";
        }
        if(($i != ($page +1) && $i > $pagebef && $i < $pagelimit) || ($i != ($page +1) && $i > $lastpage)){
            $pagination .= "<li class=\"page-item\"><a  class=\"page-link\" href='/dashboard/page/" . $i . "'>" .$i . "</a></li>";
        }
    }
} else {
    echo " <tr><td colspan='6'>no post</td> </tr>";
}

?>
</tbody>


</table>
<?php
if($result->num_rows > 0) {
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="/dashboard/page/1">First</a>
            </li>
            <?= $pagination; ?>
            <li class="page-item">
                <a class="page-link" href="/dashboard/page/<?= $pages; ?>">Last</a>
            </li>
        </ul>
    </nav>

    <?php
}
    ?>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/action" id="delete-link" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete <span class="badge badge-danger" id="judulx"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete <span class="badge badge-danger" id="judulnya"></span>
                    <input type="hidden" id="aidi" name="aidi">
                    <input type="hidden" name="action" value="delete_link">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete!</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var key = button.data('key');
            var title = button.data('title');
            var modal = $(this);
            modal.find('#judulx').text(title);
            modal.find('#judulnya').text(title);
            modal.find('#aidi').val(key)
        });
        $("#delete-link").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var id = $(this).find('#aidi').val();
            console.log(form.serialize());
            $.ajax({
                type: "POST",
                url: "/action",
                data: form.serialize(),
                success: function (data) {
                    console.log(data);
                    if(data == 1){
                        $("#file-" + id).hide();
                        $("#delete").modal('hide');
                    } else {
                        alert("Failed to delete this file");
                    }
                }
            });
        })
    </script>
<?php get_footer(); ?>