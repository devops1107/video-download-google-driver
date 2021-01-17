<?php
get_header();
?>
<h1>Settings</h1>
<?php
global $settings;
if($_SESSION['level'] == 1):
?>
    <div class="card mt-3 border-outline-primary">
        <div class="card-header">
            <h3>Player Setting</h3>
        </div>
        <div class="card-body">
            <form action="/action" method="post" id="player_setting" class="form-group">
                <input type="hidden" name="action" value="player_setting">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Logo</span>
                    </div>
                    <input type="text" class="form-control" name="logo" placeholder="Paste your logo for player" value="<?= $settings->logo;?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">VAST</span>
                    </div>
                    <input type="text" class="form-control" name="vast" placeholder="your VAST URL" value="<?= $settings->iklan;?>">
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-success" type="submit">Save Now
                        <svg class="bi bi-box-arrow-in-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.646 8.146a.5.5 0 01.708 0L8 10.793l2.646-2.647a.5.5 0 01.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 01.5.5v9a.5.5 0 01-1 0v-9A.5.5 0 018 1z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M1.5 13.5A1.5 1.5 0 003 15h10a1.5 1.5 0 001.5-1.5v-8A1.5 1.5 0 0013 4h-1.5a.5.5 0 000 1H13a.5.5 0 01.5.5v8a.5.5 0 01-.5.5H3a.5.5 0 01-.5-.5v-8A.5.5 0 013 5h1.5a.5.5 0 000-1H3a1.5 1.5 0 00-1.5 1.5v8z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card border-warning mb-3" style="margin-top:15px;">
        <div class="card-header">
            <h5>Password Change</h5>
        </div>
        <div class="card-body">
            <form action="/action" method="post" class="form-group">
                <input type="hidden" name="action" value="user_update_pass">
                <input type="hidden" name="id" value="<?= $user->id; ?>">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Old Password</span>
                    </div>
                    <input type="password" class="form-control" id="old_pass" name="old_pass" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">New Password</span>
                    </div>
                    <input type="password" class="form-control" id="new_pass" name="new_pass" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Re- Password</span>
                    </div>
                    <input type="password" class="form-control" id="re_pass" name="re_pass" required>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            <?php if(isset($_SESSION['message_password'])){ ?>
                <div class="alert alert-primary" role="alert">
                    <?= $_SESSION['message_password']; ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
endif;
?>
