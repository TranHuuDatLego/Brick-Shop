<footer style="padding: 20px 0; font-family: Arial, sans-serif; font-size:20px ">
    <div style="display: flex; justify-content: center; align-items: center;">
        <img src="../images/17.png" alt="" class="f-cute">
    </div>
    <div
        style="background-color: #f5f5f5; display: flex; justify-content: space-around; flex-wrap: wrap; padding-left:30px">
        <!-- LEGAL -->
        <div class="footer-column">
            <p class="label-footer">LEGAL</p>
            <ul style="list-style: none; padding-left: 0;">
                <li><a href="#">Faq</a></li>
                <li><a href="#">Retailers</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Cookies</a></li>
            </ul>
        </div>

        <!-- SERVICES -->
        <div class="footer-column">
            <p class="label-footer">SERVICES</p>
            <ul style="list-style: none; padding-left: 0;">
                <li><a href="#">Track Order</a></li>
                <li><a href="#">Returns</a></li>
                <li><a href="#">Shipping</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>

        <!-- GET IN TOUCH -->
        <div class="footer-column">
            <p class="label-footer">GET IN TOUCH</p>
            <p>Any questions? Let us know in store at 8th floor,
                379 Hudson St, New York, NY 10018 <br>
                or call us on (+1) 96 716 6879</p>
            <div>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- NEWSLETTER -->
        <div class="footer-column">
            <p class="label-footer">NEWSLETTER</p>
            <input type="email" placeholder="email@example.com"
                style="width: 150px; padding: 10px; margin-bottom: 10px;">
            <button
                style="background-color: #ff4081; color: white; padding: 10px 20px; border: none; cursor: pointer;">SUBSCRIBE</button>
        </div>
    </div>

    <div style="text-align: center; background-color: #f5f5f5;">
        <img src="../icons/icon-pay-01.png" alt="Payment Methods" style="margin-top: 10px;">
        <img src="../icons/icon-pay-02.png" alt="Payment Methods" style="margin-top: 10px;">
        <img src="../icons/icon-pay-03.png" alt="Payment Methods" style="margin-top: 10px;">
        <img src="../icons/icon-pay-04.png" alt="Payment Methods" style="margin-top: 10px;">
        <img src="../icons/icon-pay-05.png" alt="Payment Methods" style="margin-top: 10px;">
        <p>&copy; 2024 All rights reserved | Made with <i class="fas fa-heart"></i> Group 5</p>
    </div>
</footer>

<!-- You can add this CSS for better styling -->
<style>
    footer a {
        color: #000;
        text-decoration: none;
        font-size: 14px;
        padding-bottom: 30px
    }

    footer p {
        color: #000;
        text-decoration: none;
        font-size: 14px;
        padding-bottom: 30px;
        padding-top: 18px
    }

    footer a:hover {
        text-decoration: underline;
        padding-bottom: 30px
    }

    footer i {
        margin: 0 5px;
        font-size: 14px;
    }

    footer input[type="email"] {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding-bottom: 30px
    }

    footer button {
        border-radius: 4px;
        padding-bottom: 30px
    }

    .label-footer {
        font-weight: bold;
        font-size: 18px;
    }

    .footer-column {
        flex: 1 1 200px;
        max-width: 15%;
        background-color: #f5f5f5;
    }

    @media only screen and (max-width: 600px) {
        .footer-column {
            flex: 1 1 100px;
            /* Giảm xuống còn 100px cho màn hình nhỏ */
            max-width: 100%;
            /* Chiếm 100% chiều rộng của màn hình */
        }

        footer p {
            color: #000;
            text-decoration: none;
            font-size: 12px;
            padding-bottom: 30px;
            padding-top: 18px;
        }

        footer i {
            margin: 0 5px;
            font-size: 12px;
        }

        .label-footer {
            font-weight: bold;
            font-size: 12px;
        }

        .f-cute {
            width: 75%;
        }

        footer input[type="email"] {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding-bottom: 30px;
            width: 250px;
        }
    }
</style>