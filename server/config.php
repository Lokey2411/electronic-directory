<?php
define("ROOT", dirname(__FILE__, 2));
define("CLIENT", ROOT . "/client");
define("SERVER", ROOT . "/server");
define("UPLOAD", ROOT . "/assets/uploads");
define("BASE_URL", "http://localhost/electronic-phonebook/");
$host = "localhost";
$user = "root";
$password = "";
$db = "electronic_phonebook";

// Tạo kết nối
$con = mysqli_connect($host, $user, $password);

// Kiểm tra kết nối
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Cố gắng tạo cơ sở dữ liệu
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($con, $sql)) {
} else {
    echo "Error creating database: " . mysqli_error($con);
}

// Chọn cơ sở dữ liệu
mysqli_select_db($con, $db);
function getDBConnection()
{
    global $con;
    return $con;
}
function navigate($url)
{
    header("Location: " . $url);
}
function queryCommand($sql)
{
    // excute sql 
    global $con;
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Something went wrong when run query: " . $sql . ": " . mysqli_error($con));
    }
    return $result;
}
function createTables()
{
    // create tables if not exists
    queryCommand("create table if not exists Departments(
            `DepartmentID` INT NOT NULL AUTO_INCREMENT ,
            `DepartmentName` VARCHAR(255) NOT NULL ,
            `Address` VARCHAR(255) NOT NULL ,
            `Email` VARCHAR(255) NOT NULL ,
            `Phone` VARCHAR(255) NOT NULL , 
            `Logo` VARCHAR(255) NULL , 
            `Website` VARCHAR(255) NULL , 
            `ParentDepartmentID` INT NOT NULL , 
            PRIMARY KEY (`DepartmentID`),
            FOREIGN KEY (`ParentDepartmentID`) REFERENCES Departments(`DepartmentID`) ON DELETE SET NULL
            ) ENGINE = InnoDB;");
    queryCommand("create table if not exists Employees(
            `EmployeeID` INT NOT NULL AUTO_INCREMENT ,
            `FullName` VARCHAR(255) NOT NULL , `Address` VARCHAR(255) NOT NULL , 
            `Email` VARCHAR(255) NOT NULL , 
            `MobilePhone` VARCHAR(255) NOT NULL , 
            `Position` VARCHAR(255) NOT NULL , 
            `Avatar` VARCHAR(255) NULL,
            `DepartmentID` INT NOT NULL ,
            PRIMARY KEY (`EmployeeID`),
            FOREIGN KEY (`DepartmentID`) REFERENCES Departments(`DepartmentID`)
            )
            ENGINE = InnoDB;
        ");
    queryCommand("create table if not exists Users
            (
            `username` VARCHAR(255) NOT NULL , 
            `Password` VARCHAR(255) NOT NULL , 
            `Role` VARCHAR(255) NOT NULL , 
            `EmployeeID` INT NOT NULL , 
            PRIMARY KEY (`username`),
            FOREIGN KEY (`EmployeeID`) REFERENCES Employees(`EmployeeID`)
            )
        ");
    if (!isset(getAllDepartments()[0])) {
        queryCommand("INSERT INTO Departments (`DepartmentName`, `Address`, `Email`, `Phone`, `Logo`, `Website`, `ParentDepartmentID`) VALUES
        ('Phòng Kỹ thuật', '123 Đường ABC, Hà Nội', 'kythuat@congty.com', '0123456789', 'logo1.png', 'www.kythuat.com', 1),
        ('Phòng Kinh doanh', '456 Đường XYZ, Hà Nội', 'kinhdoanh@congty.com', '0987654321', 'logo2.png', 'www.kinhdoanh.com', 2),
        ('Phòng Nhân sự', '789 Đường QWE, Hà Nội', 'nhansu@congty.com', '0123987654', 'logo3.png', 'www.nhansu.com', 3),
        ('Phòng Kế toán', '321 Đường RTY, Hà Nội', 'ketoan@congty.com', '0987123456', 'logo4.png', 'www.ketoan.com', 4),
        ('Phòng IT', '654 Đường UIO, Hà Nội', 'it@congty.com', '0123456789', 'logo5.png', 'www.it.com', 5),
        ('Phòng Marketing', '987 Đường PAS, Hà Nội', 'marketing@congty.com', '0987654321', 'logo6.png', 'www.marketing.com', 6),
        ('Phòng Sản xuất', '741 Đường DFG, Hà Nội', 'sanxuat@congty.com', '0123987654', 'logo7.png', 'www.sanxuat.com', 7),
        ('Phòng Dự án', '852 Đường HJK, Hà Nội', 'duan@congty.com', '0987123456', 'logo8.png', 'www.duan.com', 8),
        ('Phòng Bảo trì', '963 Đường LZX, Hà Nội', 'baotri@congty.com', '0123456789', 'logo9.png', 'www.baotri.com', 9),
        ('Phòng Quản lý chất lượng', '159 Đường CVB, Hà Nội', 'chatluong@congty.com', '0987654321', 'logo10.png', 'www.chatluong.com', 10);
    ");
        queryCommand("
    INSERT INTO Employee (`FullName`, `Address`, `Email`, `MobilePhone`, `Position`, `Avatar`, `DepartmentID`) VALUES
    ('Nguyễn Văn A', '123 Đường ABC, Hà Nội', 'nva@congty.com', '0123456789', 'Nhân viên', 'avatar1.png', 1),
    ('Trần Thị B', '456 Đường XYZ, Hà Nội', 'ttb@congty.com', '0987654321', 'Trưởng phòng', 'avatar2.png', 2),
    ('Phạm Văn C', '789 Đường QWE, Hà Nội', 'pvc@congty.com', '0123987654', 'Nhân viên', 'avatar3.png', 3),
    ('Lê Thị D', '321 Đường RTY, Hà Nội', 'ltd@congty.com', '0987123456', 'Nhân viên', 'avatar4.png', 4),
    ('Hoàng Văn E', '654 Đường UIO, Hà Nội', 'hve@congty.com', '0123456789', 'Trưởng phòng', 'avatar5.png', 5),
    ('Đặng Thị F', '987 Đường PAS, Hà Nội', 'dtf@congty.com', '0987654321', 'Nhân viên', 'avatar6.png', 6),
    ('Vũ Văn G', '741 Đường DFG, Hà Nội', 'vvg@congty.com', '0123987654', 'Nhân viên', 'avatar7.png', 7),
    ('Bùi Thị H', '852 Đường HJK, Hà Nội', 'bth@congty.com', '0987123456', 'Trưởng phòng', 'avatar8.png', 8),
    ('Ngô Văn I', '963 Đường LZX, Hà Nội', 'nvi@congty.com', '0123456789', 'Nhân viên', 'avatar9.png', 9),
    ('Lý Thị J', '159 Đường CVB, Hà Nội', 'ltj@congty.com', '0987654321', 'Nhân viên', 'avatar10.png', 10);
    ");
        queryCommand("
    INSERT INTO Users (`username`, `Password`, `Role`, `EmployeeID`) VALUES
        ('nva', 'password1', 'User', 1),
        ('ttb', 'password2', 'User', 2),
        ('pvc', 'password3', 'User', 3),
        ('ltd', 'password4', 'User', 4),
        ('admin', 'admin', 'Admin', 5),
        ('dtf', 'password6', 'User', 6),
        ('vvg', 'password7', 'User', 7),
        ('bth', 'password8', 'User', 8),
        ('nvi', 'password9', 'User', 9),
        ('ltj', 'password10', 'User', 10);
");
    }
}
function getUserInformation()
{
    $id = $_GET['id'];
    $result = queryCommand("SELECT * from employees where EmployeeID = $id");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($user);
    }
}
function getAllEmployees()
{
    $result = queryCommand("SELECT DISTINCT e.EmployeeID, e.FullName, e.Address, e.Email, e.MobilePhone, e.Position, d.DepartmentName from employees as e JOIN departments as d ON e.DepartmentID = d.DepartmentID ");
    if ($result->num_rows > 0) {
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        header('Content-Type: application/json');
        return $users;
    } else {
        return [];
    }
}
function getAllDepartments()
{
    $sql = "SELECT d.DepartmentID, d.DepartmentName, d.Address, d.Email, d.Phone,d.Website, p.DepartmentName as ParentDepartmentName 
    FROM departments as d 
    join departments as p 
    on d.DepartmentID = p.DepartmentID 
    where d.DepartmentName NOT LIKE '%Không xác định%';";
    $result = queryCommand($sql);
    if ($result->num_rows > 0) {
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        header('Content-Type: application/json');
        return $users;
    } else {
        return [];
    }
}