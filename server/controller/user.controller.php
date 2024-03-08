<?php
    require_once "../config.php";
    function uploadImage(){
        if(!isset($_FILES["avatar"])) return NULL;
        $now   = new DateTime(); //this returns the current date time
        $target_dir = UPLOAD."/images/";
        $target_file = $target_dir .$now->format('Y-m-d-H-i-s') . basename($_FILES["avatar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            }

            // Check file size
            if ($_FILES["avatar"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            echo $imageFileType;
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( $now->format('Y-m-d-H-i-s').basename( $_FILES["avatar"]["name"])). " has been uploaded.";
                return htmlspecialchars( $now->format('Y-m-d-H-i-s').basename( $_FILES["avatar"]["name"]));
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    // post method for update user
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $requestUrl = BASE_URL."?controller=Pages&action=UserInformation";
            session_start();
            
            if(isset($_SESSION["Role"])) {
                if($_SESSION["Role"] == "Admin") {
                    // handle with admin
                    $EmployeeID = $_SESSION["EmployeeID"];
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $avatar = uploadImage();
                    if ($avatar !== null) {
                    // Nếu $avatar không phải là null, thực hiện câu truy vấn update
                    $result = queryCommand("UPDATE employees SET FullName = '$name', Email = '$email', MobilePhone = '$phone', avatar = '$avatar' WHERE EmployeeID = '$EmployeeID'");
                } else {
                    // Nếu $avatar là null, chỉ cập nhật các trường khác mà không cập nhật avatar
                    $result = queryCommand("UPDATE employees SET FullName = '$name', Email = '$email', MobilePhone = '$phone' WHERE EmployeeID = '$EmployeeID'");
                }
            //insert data into database 
                    if($result){
                        navigate(BASE_URL."");
                    }
                    else{
                        navigate($requestUrl."&error=Cập nhật thành công");
                    }
                }
                else{
                    echo "not admin";
                }
            }
            else{
                header("Location: " . $requestUrl ."&error=Bạn không thể chỉnh sửa thông tin");
            }
        break;
        case 'GET':
            session_start();
            $requestUrl = BASE_URL."?controller=Pages&action=UserInformation";
            if(isset($_SESSION["Role"])) {
                $EmployeeID = $_SESSION["EmployeeID"];
                $result = queryCommand("SELECT * from employees where EmployeeID = $EmployeeID");
                if($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    header('Content-Type: application/json');
                    echo json_encode($user);
                }
                else{
                    echo "not found";
                }
            }
            else{
                echo "not allowed";
            }
        break;
        default: echo "not allowed";
    }
?>