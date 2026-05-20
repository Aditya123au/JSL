        </div>
    </div>
    <footer>
        <div class="copy-right">
            <p>Copyright &copy; 2026 All rights reserved | This template is made with <i class="fa-solid fa-heart"></i> by <a href="https://aditya123au.github.io/portfolio" target="_blank">Aditya Pandey</a></p>
        </div>
    </footer>
    <style>
        footer {
            margin-top: 20px;
            padding-block: 30px;
            text-align: center;
            background: blue;
            color: #ffffff;
        }
        footer a{
            color: #ffffff;
            cursor: pointer;
        }
    </style>
    <script type="text/javascript" src="js/common.js"></script>
    <?php 
        if ($currentPage === 'user.php'){
            echo '<script type="text/javascript" src="js/user_table.js"></script>';
        }
        elseif ($currentPage === 'products.php'){
            echo '<script type="text/javascript" src="js/product_table.js"></script>';
        }
        elseif ($currentPage === 'news.php'){
            echo '<script type="text/javascript" src="js/news_table.js"></script>';
        }
    ?>

</body>

</html>