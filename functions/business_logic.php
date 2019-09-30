<?php
    function getUserDetails($email) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = query($sql);
        confirm($result);
        $row = fetch_array($result);
        return $row;
    }

?>