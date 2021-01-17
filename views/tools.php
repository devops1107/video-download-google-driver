<?php
get_header();
?>

<h1>Tools</h1>
<div class="card">
    <div class="card-header">
        <h3>API KEY</h3>
    </div>
    <div class="card-body">
        <input type="text" class="form-control" readonly value="<?= $_SESSION['api']; ?>">
    </div>
</div>
<div class="card bg-primary text-white mt-3">
    <div class="card-header">
        <h3>How to Use it?</h3>
    </div>
    <div class="card-body">
        <input type="text" class="form-control" readonly value="<?= $_SERVER['HTTP_HOST'] . "/api/" . $_SESSION['api'] ."?url=googleURL"; ?>">
        <ol>
            <li>Use that URL as <span class="badge badge-warning">cURL</span> or <span class="badge badge-warning">file_get_contents</span></li>
            <li>It will return as text</li>
            <li>Just use <span class="badge badge-warning">echo</span> to show result</li>
        </ol>
    </div>
</div>

<?php
get_footer();
?>
