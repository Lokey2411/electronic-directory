<?php
require_once '../config.php';
// Hàm lấy danh sách bộ phận
function uploadImage()
{
    if (!isset($_FILES["logo"]))
        return NULL;
    $now = new DateTime(); //this returns the current date time
    $target_dir = UPLOAD . "/images/";
    $target_file = $target_dir . $now->format('Y-m-d-H-i-s') . basename($_FILES["logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["logo"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["logo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    echo $imageFileType;
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars($now->format('Y-m-d-H-i-s') . basename($_FILES["logo"]["name"])) . " has been uploaded.";
            return htmlspecialchars($now->format('Y-m-d-H-i-s') . basename($_FILES["logo"]["name"]));
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
function getDepartmentById($id)
{
    global $con;
    $sql = "SELECT * FROM departments WHERE DepartmentID = $id;";
    $result = $con->query($sql);
    if ($result) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
if (isset($_GET["id"])) {
    echo json_encode(getDepartmentById($_GET["id"]));
} else {
    echo json_encode(getAllDepartments());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requestUrl = BASE_URL . "?controller=Pages&action=DepartmentInformation";
    $id = $_GET["id"];
    $logo = $_POST["logo"];
    $avatar = uploadImage();
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $website = $_POST["website"];
    $parent = $_POST["parent"];
    if ($avatar != null) {
        $sql = "UPDATE departments SET Logo='$avatar', DepartmentName = '$name', Email = '$email', Phone = '$phone', Address = '$address', Website = '$website', ParentDepartmentID = '$parent' WHERE DepartmentID = $id;";
    } else {
        $sql = "UPDATE departments SET DepartmentName = '$name', Email = '$email', Phone = '$phone', Address = '$address', Website = '$website', ParentDepartmentID = '$parent' WHERE DepartmentID = $id;";
    }
    $result = $con->query($sql);
    if ($result) {
        navigate(BASE_URL);
    } else {
        navigate($requestUrl . "&error=Không thể cập nhật");
    }
}