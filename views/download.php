<?php
get_header();
$sql = "select * from links where short='" . $id . "'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()):
        $s = new WDrive();
        $gid = $row['file'];
        $googleID = getID($gid);
        $idid = str_replace('-', '1_1_1', str_rot13($googleID));
        $s->setID($googleID ?? "");
        ?>
        <div class=" h-100 justify-content-center  align-items-center mt-5">
                <h1>Download <?= $row['name']; ?></h1>
            <div class="card">
                <div class="card-body">
                    <?php
                    foreach($s->getResolution() as $res){
                        $setRes = str_replace('p', '', $res);
                        ?>
                        <a href="/f/<?= $idid; ?>/<?=$setRes;?>">
                        <button class="btn btn-success dl" type="button"><?= $res; ?></button>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

    <?php
    endwhile;
}
get_footer();
