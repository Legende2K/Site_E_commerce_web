<?php
function changePersonalInformations($name, $firstname, $phone) {
    global $mysqli;

    $sql = "UPDATE user SET name = '$name', firstName = '$firstname', phone = '$phone' WHERE UserID = '$_SESSION[compte]'";
    $mysqli->query($sql);
}

function changeAddress($address, $complementary_address, $zip, $city, $country) {
    global $mysqli;

    $sql = "UPDATE user SET address1 = '$address', address2 = '$complementary_address', postalCode = '$zip', city = '$city', country = '$country' WHERE UserID = '$_SESSION[compte]'";
    $mysqli->query($sql);
}

function changeEmail($new_email) {
    global $mysqli;

    $sql = "UPDATE user SET email = '$new_email' WHERE UserID = '$_SESSION[compte]'";
    $mysqli->query($sql);
}

function changePassword($new_password) {
    global $mysqli;

    $sql = "UPDATE user SET password = '$new_password' WHERE UserID = '$_SESSION[compte]'";
    $mysqli->query($sql);
}