<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../php/head.php'; ?>
    <?php include '../php/login.php'; ?>
    <?php include '../php/getUser.php'; ?>
    <title>Brick Shop</title>
</head>
<style>
    /* Global Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
    }



    /* Qman Section */
    .qman-section {
        display: flex;
        padding: 50px;
        height: 900px;
        width: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        /* Hình nền bao phủ toàn bộ phần tử */
        background-position: center;
        background-image: url("../images/index.png");
        /* Căn giữa hình nền */
        
    }

    /* Responsive chỉnh sửa cho màn hình nhỏ hơn */
    @media only screen and (max-width: 768px) {
        .qman-section {
            background-image: url("../images/index-phone.png");
            height: 1400px;
            /* Chiều cao tự động điều chỉnh theo nội dung */
            

        }

    }


    .qman-text {
        flex: 1;
        font-size: 16px;
    }

    .qman-text h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .qman-image img {
        max-width: 100%;
        padding-left: 30px;
    }

    /* Keeppley Section */
    .keeppley-section {
        margin-top: 20px;
        display: flex;
        padding: 50px;
        color: white;
        height: 900px;
        width: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        /* Hình nền bao phủ toàn bộ phần tử */
        background-position: center;
        /* Căn giữa hình nền */
        background-image: url('../images/20220906090844329.jpg');
        padding-left: 100px;
    }

    /* Responsive chỉnh sửa cho màn hình nhỏ hơn */
    @media only screen and (max-width: 768px) {
        .keeppley-section {
            max-height: 1800px;
            /* Chiều cao tự động điều chỉnh theo nội dung */
            background-image: url('../images/20220906090914242.jpg');
            padding-left: 30px;
        }
    }

    .keeppley-text {
        flex: 1;
        font-size: 16px;
    }

    .keeppley-text h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .keeppley-image img {
        max-width: 100%;
        padding-left: 30px;
    }

    /* LEGO Section */
    .lego-section {
        padding: 50px;
        background-color: #fff;
        font-size: 16px;
    }

    /* Default for larger screens (desktop) */

    .img-lego {
        flex: 1 1 25%;
        /* Each image takes up 25% of the container width */
        max-width: 25%;
        padding: 20px;
        box-sizing: border-box;
        /* Include padding in width calculations */
    }

    .lego-products {
        display: flex;
        flex-wrap: wrap;
        /* Ensure wrapping on smaller screens */
    }

    .lego-products .product {
        width: 350px;
        flex-basis: 350px;
        /* Ensures the element respects the set width */
        margin: 10px;
        /* Optional: Adds spacing between products */
        box-sizing: border-box;
        /* Ensure padding/borders don’t affect width */
    }


    .lego-products .product img {
        max-width: 100px;
    }

    /* Tablet - kích thước màn hình từ 768px đến 1024px */
    @media only screen and (max-width: 1024px) {
        .img-lego {
            /* Each image takes up 50% of the container width */
            max-width: 33%;
        }
    }

    /* Phone - kích thước màn hình dưới 768px */
    @media only screen and (max-width: 768px) {
        .img-lego {
            /* Each image takes up 50% of the container width */
            max-width: 50%;
        }
    }

    /* Rất nhỏ - kích thước màn hình dưới 480px */
    @media only screen and (max-width: 480px) {
        .img-lego {
            /* Each image takes up 50% of the container width */
            max-width: 110%;
        }
    }

    /* For mobile phones: 2 images per row */
    @media only screen and (max-width: 600px) {
        .img-lego {
            /* Each image takes up 50% of the container width */
            max-width: 110%;
        }

        .para2 {
            color: white;
        }
    }

    /* Tablet - kích thước màn hình từ 768px đến 1024px */
    @media only screen and (max-width: 1024px) {
        .lego-products .product {
            flex: 1 1 32%;
            /* Tablet: Chiều rộng tối đa là 32% */
        }
    }

    /* Phone - kích thước màn hình dưới 768px */
    @media only screen and (max-width: 768px) {
        .lego-products .product {
            flex: 1 1 50%;
            /* Phone: Chiều rộng tối đa là 50% */
        }
    }

    /* Rất nhỏ - kích thước màn hình dưới 480px */
    @media only screen and (max-width: 480px) {
        .lego-products .product {
            flex: 1 1 100%;
            /* Màn hình rất nhỏ: Chiều rộng tối đa là 100% */
        }
    }

</style>

<body>
    <!-- Header Section -->
    <header>
        <!-- Mobile Navbar -->
        <?php include '../php/OurStory_en.php' ; ?>

        <!-- Mobile Navbar -->
        <?php include '../php/mobile_en.php' ?>

    </header>

    <!-- Qman Section -->
    <section style="padding-left: 80px;" class="qman-section">
        <div class="qman-text">
            <img style="padding-left: 30px;" src="../images/2022101014476761.png" alt="Keeppley Product">
            <h1 style="margin-bottom: 30px; max-width: 700px;">A leading Chinese toy brand, specializing in original
                building blocks since 1994.</h1>
            <p style="margin-bottom: 30px; max-width: 700px;">The journey of Qman began in 1994, sparked by Mr. Zhan
                Kehua's realization
                of his children's deep love for building blocks. This passion inspired the creation of an original
                Chinese brand focused on building blocks.</p>
            <p class="p2" style="margin-bottom: 50px; max-width: 700px;">Today, Qman has evolved into more than just a
                children's
                toy brand—it is a celebrated national brand that has grown alongside multiple generations. We are
                committed to the brand philosophy that "Qman blocks make dreams come true," and together with our
                customers, we use small building pieces to bring dreams to life.</p>
            <a href="../en/Qman_Products.php" class="btn">View Products</a>
        </div>
        <div class="qman-image">

        </div>
    </section>

    <!-- Keeppley Section -->
    <section class="keeppley-section">
        <div class="keeppley-text">
            <img style="padding-left: 30px;" src="../images/2022082419251955.png" alt="Keeppley Product" height="40">
            <h1>A new generation block brand, born in 2019.</h1>
            <p style="margin-bottom: 30px; ; max-width: 800px;">Keeppley is a new-generation brand under Qman, a company
                that has
                specialized in producing building block models similar to LEGO since 1994. Keeppley focuses on offering
                players high-quality, officially licensed products at affordable prices, making them accessible to
                anyone.</p>
            <p style="margin-bottom: 50px; ; max-width: 800px;">
                Keeppley's product range is incredibly diverse, spanning creative house and shop models,magnificent
                architectural structures, as well as unique themes like Pokémon, Doraemon, and other anime and manga
                series.
            </p>
            <a href="../en/Keeppley_Products.php" class="btn">View Products</a>
        </div>
        <div class="keeppley-image">

        </div>
    </section>

    <!-- LEGO Section -->
    <section class="lego-section">
        <div class="lego-text">
            <div style="display: flex; justify-content: center; margin-bottom:25px">
                <img src="../images/LEGO_logo.png" alt="LEGO Logo" height="100">
            </div>

            <p style="margin: 30px;">LEGO, a globally iconic toy brand, is celebrated for its interlocking plastic bricks that spark
                creativity and imagination. Founded in 1932 by Ole Kirk Christiansen in Denmark, LEGO began as a wooden
                toy manufacturer before evolving into the plastic brick system we know today in 1958.
            </p>
            <p style="margin: 30px;">
                LEGO sets come in various themes, including LEGO City, Ninjago, Nexo Knight, Chima, and licensed series
                like Harry Potter, Despicable Me 4. Beyond physical toys, LEGO has expanded into video games, movies
                (The LEGO Movie), and digital apps, offering endless creative opportunities for both children and
                adults.
            </p>
            <p style="margin: 30px;">
                At the heart of LEGO's mission are six core values: imagination, creativity, fun, learning, caring, and
                quality. Together, these values help children and families explore their potential while ensuring
                top-tier product quality and joyful experiences.
            </p>
        </div>
        <div class="img-container">
            <a href="#"><img class="img-lego" src="../images/LegoChima.jfif" alt="" height="150" width="275"></a>
            <a href="#"><img class="img-lego" src="../images/LegoNexoKnights.jfif" alt="" height="150" width="275"></a>
            <a href="#"><img class="img-lego" src="../images/LEGO-City-logo.jpg" alt="" height="150" width="275"></a>
            <a href="#"><img class="img-lego" src="../images/LegoNinjago.jfif" alt="" height="150" width="275"></a>
        </div>
    </section>


    <!-- Footer Section -->
    <?php include '../en/footer.php' ?>


    <!-- Cart Section -->
    <?php include '../en/cart.php' ?>
</body>
<script>
    function toggleMenu() {
        var navLayer = document.getElementById("nav-menu");
        navLayer.classList.toggle("active");
    }
</script>

</html>