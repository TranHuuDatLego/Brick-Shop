<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'keeppley-shop'); // servername, username, password, database's name
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Kiểm tra xem `p_id` có tồn tại và hợp lệ không
if (isset($_GET['p_id']) && is_numeric($_GET['p_id'])) {
    $p_id = mysqli_real_escape_string($conn, $_GET['p_id']);

    // Truy vấn để lấy thông tin sản phẩm dựa trên `p_id`
    $sql = "SELECT * FROM product WHERE p_id = $p_id";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $p_id = $row['p_id'];
        $p_number = $row['p_number'];
        $p_name_en = $row['p_name_en'];
        $p_name_vn = $row['p_name_vn'];
        $p_category = $row['p_category'];
        $p_price = $row['p_price'];
        $p_tutorial = $row['p_tutorial'];
        $p_description = $row['p_description'];

        // Tách chuỗi hình ảnh thành mảng và loại bỏ khoảng trắng thừa
        $product_images = array_map('trim', explode(',', $row["p_image"]));

        // Kiểm tra và gán lại giá trị nếu ảnh thứ 2 và thứ 3 trống
        if (empty($product_images[1])) {
            $product_images[1] = $product_images[0];
        }

        if (empty($product_images[2])) {
            $product_images[2] = $product_images[0];
        }
    } else {
        // Nếu không tìm thấy sản phẩm, chuyển hướng người dùng về trang quản lý sản phẩm
        header('Location: manageProduct.php');
        exit();
    }
} else {
    // Nếu không có `p_id` hoặc giá trị không hợp lệ, chuyển hướng người dùng về trang quản lý sản phẩm
    header('Location: manageProduct.php');
    exit();
}

// Lấy danh sách các danh mục để hiển thị trong form chọn
$sqlCategory = "SELECT * FROM `category`";
$resultCategory = mysqli_query($conn, $sqlCategory);

$categories = array();
if ($resultCategory->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($resultCategory)) {
        $categories[] = $row['name_en'];
    }
}

?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <?php include 'head.php' ?>
    <?php include 'login.php' ?>
    <?php include 'getAdmin.php' ?>
</head>
<Style>
    /* Thay đổi màu hover của nút */
    .input:hover {
        background-color: #f5f5f5;
        /* Màu xám */

    }

    /* Container chứa form */
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Đảm bảo form có kích thước phù hợp */
    .form-container form {
        width: 100%;
        /* Hoặc giá trị phù hợp với form của bạn */
    }

    a {
        color: black;
    }


</Style>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">

            <?php include 'aside.php' ?>

        </aside>
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
            x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
            @keydown.escape="closeSideMenu">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    Windmill
                </a>
                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="index.html">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="forms.html">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <span class="ml-4">Forms</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="cards.html">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span class="ml-4">Cards</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="charts.html">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            <span class="ml-4">Charts</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="buttons.html">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                                </path>
                            </svg>
                            <span class="ml-4">Buttons</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="modals.html">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="ml-4">Modals</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="tables.html">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            <span class="ml-4">Tables</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <button
                            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            @click="togglePagesMenu" aria-haspopup="true">
                            <span class="inline-flex items-center">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                    </path>
                                </svg>
                                <span class="ml-4">Pages</span>
                            </span>
                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <template x-if="isPagesMenuOpen">
                            <ul x-transition:enter="transition-all ease-in-out duration-300"
                                x-transition:enter-start="opacity-25 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-xl"
                                x-transition:leave="transition-all ease-in-out duration-300"
                                x-transition:leave-start="opacity-100 max-h-xl"
                                x-transition:leave-end="opacity-0 max-h-0"
                                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                aria-label="submenu">
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="pages/login.html">Login</a>
                                </li>
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="pages/create-account.html">
                                        Create account
                                    </a>
                                </li>
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="pages/forgot-password.html">
                                        Forgot password
                                    </a>
                                </li>
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="pages/404.html">404</a>
                                </li>
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="pages/blank.html">Blank</a>
                                </li>
                            </ul>
                        </template>
                    </li>
                </ul>
                <div class="px-6 my-6">
                    <button
                        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Create account
                        <span class="ml-2" aria-hidden="true">+</span>
                    </button>
                </div>
            </div>
        </aside>
        <div class="flex flex-col flex-1 w-full">

            <?php include 'Profile_Header.php'; ?>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <div class="flex items-center my-6">
                        <h2 style="padding: 20px"
                            class="stext-121 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            <a href="editProduct.php?p_id=<?php echo $p_id ?>">Edit Product</a>
                        </h2>
                        <h2 style="padding: 20px"
                            class="stext-121 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            <a href="editImages.php?p_id=<?php echo $p_id ?>"><u>Edit Images</u></a>
                        </h2>
                        <h2 style="padding: 20px"
                            class="stext-121 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            <a href="editInstruction.php?p_id=<?php echo $p_id ?>">Edit Instruction</a>
                        </h2>
                    </div>

                    <div class="form-container container mt-5">
                        <form action="updateImages.php" method="POST" enctype="multipart/form-data">
                            <input class="form-control input" name="p_id" id="name" type="hidden"
                                placeholder="Number Product" value="<?php echo $p_id ?>">

                            <div class="form-group">
                                <label for="file1">Image Product 1 (Required)</label>
                                <input class="form-control-file input " id="file1" name="p_image[]" type="file"
                                    onchange="previewImage(event, 'preview1')">
                                <img id="preview1" src="../../images/<?php echo $product_images[0] ?> " >
                            </div>
                            <div class="form-group">
                                <label for="file2">Image Product 2 (Optional)</label>
                                <input class="form-control-file input preview2" id="file2" name="p_image[]" type="file"
                                    onchange="previewImage(event, 'preview2')">
                                <img id="preview2" src="../../images/<?php echo $product_images[1] ?>" >
                            </div>
                            <div class="form-group">
                                <label for="file3">Image Product 3 (Optional)</label>
                                <input class="form-control-file input preview3" id="file3" name="p_image[]" type="file"
                                    onchange="previewImage(event, 'preview3')">
                                <img id="preview3" src="../../images/<?php echo $product_images[2] ?>" >
                            </div>



                            <div class="form-group">
                                <button name="sbm" class="btn btn-primary" type="submit">Update Product</button>
                                <a href="../../Fontend/product2.php" class="btn btn-secondary">User Interface</a>
                            </div>
                        </form>
                    </div>


                </div>
            </main>
        </div>
    </div>
</body>
<script>
    function previewImage(event, previewId) {
        const file = event.target.files[0];
        const preview = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>