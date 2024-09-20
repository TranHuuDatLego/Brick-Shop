<style>
    .img-user {
        margin-top: 15px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<li><a href="../en/<?php echo $website ?>" class="cur">EN</a></li>
<li><a href="../vn/<?php echo $website ?>">VN</a></li>

<!-- Show Icon cart and Profile Avatar -->
<?php if ($userLogin['userName']): ?>

    <!-- <li><a href="#">Welcome, Doraemon và những người bạn tuyệt vời</a></li> -->

    <!-- Show Icon cart  -->
    <!-- <button >Giỏ hàng</button> -->
    <li><a id="cartButton" class="fa-solid fa-cart-shopping btn-cart" style="color: #000000;"></a> </li>

    <!-- Show Profile Avatar -->
    <?php if (!$userLogin['image']): ?>
        <li><a href="../en/General.php"><img class="img-user" src="../user/male.png" width="50" height="50"></a></li>

    <?php else: ?>
        <li><a href="../en/General.php"><img class="img-user" src="../user/<?php echo $userLogin['image'] ?>" width="50" height="50"></a></li>
    <?php endif ?>

<?php else: ?>
    <li style="margin-top: 20px;">
        <a href="../php/ChooseLogin_en.php"
            style="display: block; background-color: #e0e0e0; height: 40px; font-size: 16px; 
              font-family: Inter; font-weight: 700; border-radius: 20px; padding: 0px 12px; position: relative;">
            <div style="top: 20%; left: 50%; transform: translate(-2%, -25%); margin-top: 0; padding-left:12px; padding-right:12px">
                Sign Up
            </div>
        </a>
    </li>

    <li style="margin-top: 20px;">
        <a href="../php/ChooseLogin_en.php"
            style="display: block; background-color: #000000; height: 40px; color: white; font-size: 16px; 
              font-family: Inter; font-weight: 700; border-radius: 20px; padding: 0px 12px; position: relative;">
            <div style="top: 20%; left: 50%; transform: translate(-2%, -25%); margin-top: 0; padding-left:12px; padding-right:12px">
                Login
            </div>
        </a>
    </li>

<?php endif; ?>