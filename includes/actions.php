<?php
/*
 * @ PHP 5.6
 * @ Decoder version: 1.9
 * @ Release: 14/05/2020
 */




global $settings;
if (input()->post('action')->value == "login") {
    $sql = "select * from users where username ='" . input()->post('username')->value . "' and password = '" . md5(input()->post('password')->value) . "'";
    $result = $conn->query($sql);
if($result->num_rows > 0){
            $s = time();
            $sql = "update users set session='" . md5($s) . "' where username='".input()->post('username')->value."'";
            $conn->query($sql);
            $_SESSION['session'] = md5($s);
            foreach ($result->fetch_assoc() as $key => $val){
                $_SESSION[$key] = "$val";
            }
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Success Login, you will redirect";
            update_option('status', '1');
            redirect("dashboard", 301);

        } else {
            echo "gak ada";
            $_SESSION['status'] = "failed";
            $_SESSION['message'] = "Failed! Check Username and Password";
        }
        header('Location: /login');
}
if (input()->post('action')->value == "register") {
    $api = md5(sha1(rand()));
    $sql = "INSERT INTO users (username, email, password, api) value ('" . input()->post('username')->value . "',
        '" . input()->post('email')->value . "',
        '" . md5(input()->post('password')->value) . "',
        '$api')";
    if ($conn->query($sql) == TRUE) {
        $_SESSION['message'] = "Congratz!";
        redirect("dashboard", 301);
    } else {
        $_SESSION['message'] = "Username or Email has beed registered";
    }
}
if (input()->post('action')->value == "add_link") {
    
        $gid = getID(input()->post('url')->value);
        $subtitle = urlencode(input()->post('subtitle')->value);
        $url = "https://drive.google.com/e/get_video_info?docid=" . $gid;
        $get = file_get_contents($url);
        $title = explode("&", explode("title=", $get) [1]) [0];
        $rand = rndText(32);
        $sql = "insert into links (name, file, short,subtitle, created_by) value ('" . urldecode($title) . "', '" . input()->post('url')->value . "', '" . $rand . "', '" . $subtitle . "', '" . $_SESSION['api'] . "')";
        if ($conn->query($sql) == true) {
            echo $rand;
        } else {
            return false;
        }
    
}
if (input()->post('action')->value == "delete_link") {
    $id = input()->post('aidi')->value;
    $sql = "delete from links where id='" . $id . "'";
    if ($conn->query($sql) == true) {
        echo "1";
    } else {
        echo "0";
    }
}
if (input()->post('action')->value == "license_active") {
    Hidupkan(input()->post('license_key')->value);
    redirect("dashboard/settings", 301);
}
if (input()->post('action')->value == "license_deactive") {
    Matikan(input()->post('license_key')->value);
    redirect("dashboard/settings", 301);
}
if (input()->post('action')->value == "player_setting") {
    $logo = urlencode(input()->post('logo')->value);
    $iklan = urlencode(input()->post('vast')->value);
    update_option('logo', $logo);
    update_option('iklan', $iklan);
    redirect("dashboard/settings", 301);
}
if (input()->post('action')->value == "user_update") {
    $email = input()->post('email')->value;
    $name = input()->post('name')->value;
    $telp = input()->post('telp')->value;
    $id = input()->post('id')->value;
    $sql = "update users set `email` = '$email', `name` = '$name', `telp` = '$telp' where `id` = '$id'";
    $conn->query($sql);
    redirect("dashboard/settings", 301);
}
if (input()->post('action')->value == "user_update_pass") {
    $oldpass = input()->post('old_pass')->value;
    $newpass = input()->post('new_pass')->value;
    $repass = input()->post('re_pass')->value;
    $id = $_SESSION['id'];
    if ($newpass == $repass) {
        $sql = "update users set `password` = MD5('$newpass') where `id` = '$id' and `password` = MD5('$oldpass')";
        if ($conn->query($sql) == true) {
            $_SESSION['message_password'] = "Success Change";
        } else {
            $_SESSION['message_password'] = "Check your old Password";
        };
    } else {
        $_SESSION['message_password'] = "Make sure you enter match password";
    }
    redirect("dashboard/settings", 301);
}

