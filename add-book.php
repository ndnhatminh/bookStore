<?php
session_start();

#If the admin is logged in
if (
    isset($_SESSION['username']) &&
    isset($_SESSION['password'])
) {

    # Database Connection File
    include "db_conn.php";

    # Category helper function
    include "php/func-category.php";
    $categories = get_all_categories($conn);

    // # authors helper function
    // include "php/func-author.php";
    // $authors = get_all_author($conn);
    if (isset($_GET['BookID'])) {
        $BookID = $_GET['BookID'];
    } else $BookID = '';

    if (isset($_GET['title'])) {
        $title = $_GET['title'];
    } else $title = '';

    if (isset($_GET['desc'])) {
        $desc = $_GET['desc'];
    } else $desc = '';

    if (isset($_GET['author'])) {
        $author = $_GET['author'];
    } else $author = '';

    if (isset($_GET['publication'])) {
        $publication = $_GET['publication'];
    } else $publication = '';

    if (isset($_GET['publisher'])) {
        $publisher = $_GET['publisher'];
    } else $publisher = '';

    if (isset($_GET['listprice'])) {
        $listprice = $_GET['listprice'];
    } else $listprice = '';

    if (isset($_GET['category_name'])) {
        $category_name = $_GET['category_name'];
    } else $category_name = "";


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <title>Add Book BOOKStore</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="padding: 1.5% 7%; width: 100%; border-radius: 0; background-color:#354c7c">
            <div class="container-fluid">
                <a class="navbar-brand" aria-current="page" href="index.php?role=staff" style="margin-right:47%"><span style="color: #fef702;">BOOK</span>Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size: 20px;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="add-book.php">Sách</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-category.php">Thể Loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-program.php">Khuyến Mãi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin.php">Quản Trị Viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Đăng Xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <form action="php/add-book.php" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded mt-5" style="windows: 90%; max-width: 50rem; margin:auto">
                <h1 class="text-center pb-5 display-4 fs-3">
                    Sách Mới
                </h1>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= htmlspecialchars($_GET['success']); ?>
                    </div>
                <?php } ?>
                <div class="mb-3" style="display: flex; text-align:center;">
                    <label class="form-label" style="align-self: flex-end;">Mã Sách</label>
                    <input type="text" class="form-control" value="<?= $BookID ?>" placeholder="Mã bạn muốn thêm..." name="book_id" style="width:80%; margin-left:11.5%;" required>
                </div>

                <div class="mb-3" style="display: flex; text-align:center;">
                    <label class="form-label" style="align-self: flex-end;">Tên Sách</label>
                    <input type="text" class="form-control" value="<?= $title ?>" placeholder="Tên sách bạn muốn thêm..." name="book_title" style="width:80%; margin-left:11%;" required>
                </div>

                <div class="mb-3" style="display: flex; text-align:center;">
                    <label class="form-label" style="align-self: flex-end;">Năm Xuất Bản</label>
                    <input type="text" class="form-control" value="<?= $publication ?>" placeholder="Năm xuất bản của sách đó..." name="book_publication" style="width:80%; margin-left:6%;" required>
                </div>

                <div class="mb-3" style="display: flex; text-align:center;">
                    <label class="form-label" style="align-self: flex-end;">Nhà Xuất Bản</label>
                    <input type="text" class="form-control" value="<?= $publisher ?>" placeholder="Nhà xuất bản sách đó..." name="book_publisher" style="width:80%; margin-left:6.5%;" required>
                </div>

                <div class="mb-3" style="display: flex; text-align:center;">
                    <label class="form-label" style="align-self: flex-end;">Mô Tả</label>
                    <input type="text" class="form-control" value="<?= $desc ?>" name="book_description" placeholder="Giới thiệu sơ lượt..." style="width:80%; margin-left:14%;" required>
                </div>

                <div class="mb-3" style="display: flex; text-align:center;">
                    <label class="form-label" style="align-self: flex-end;">Tác Giả</label>
                    <input type="text" class="form-control" value="<?= $author ?>" name="book_author" placeholder="Tác giả..." style="width:80%; margin-left:12.5%;" required>
                </div>

                <div class="mb-3" style="display: flex; text-align:center;">
                    <label class="form-label" style="align-self: flex-end;">Giá</label>
                    <input type="text" class="form-control" value="<?= $listprice ?>" name="book_price" placeholder="Đơn vị VNĐ..." style="width:80%; margin-left:16.5%;" required>
                </div>

                <div class="mb-3" style="display: flex; text-align:center;">
                    <label class="form-label" style="align-self: flex-end;">Thể Loại</label>
                    <select name="book_category" class="form-control" style="width:80%; margin-left:11.5%;">
                        <option value="">
                            Chọn thể loại
                        </option>
                        <?php
                        if ($categories == 0) {
                            # Do nothing
                        } else {
                            foreach ($categories as $category) {
                                if ($category_name == $category['C_Name']) {
                        ?>
                                    <option selected value="<?= $category['C_Name'] ?>">
                                        <?= $category['C_Name'] ?>
                                    </option>
                                <?php } else { ?>
                                    <option value="<?= $category['C_Name'] ?>">
                                        <?= $category['C_Name'] ?>
                                    </option>
                        <?php }
                            }
                        } ?>
                    </select>
                </div>

                <div class="mb-3" style="display: flex; text-align:center;">
                    <label class="form-label" style="align-self: flex-end;">Bìa Sách</label>
                    <input type="file" class="form-control" value="<?= $cover ?>" name="book_cover" style="width:80%; margin-left:11.5%;" required>
                </div>
                <div class="mb-3" style="text-align:center;">
                    <button type="submit" class="btn btn-outline-primary">
                        Thêm Ngay</button>
                </div>

            </form>
        </div>
        <footer style="background-color:#354c7c; margin-top:60px;">
            <div class="text-center p-3" style="color:#ffffff;">
                © 2023:
                <a class="navbar-brand" aria-current="page" href="index.php?role=staff"><span style="color: #fef702;">BOOK</span>Store -- bookstore.support@gmail.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </body>

    </html>

<?php } else {
    header("Location: login.php");
    exit;
} ?>