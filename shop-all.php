<?php
include('include/home_head.php');   ?>
<link rel="stylesheet" href="css/api-integration.css">
    <div class="container">
        <div class="top-header">
            <div class="header-left">
                <h1>
                    Featured Products
                </h1>
            </div>
            <button class="refresh-btn" onclick="loadAllData()">
                Refresh Data
            </button>
        </div>
        <div class="loading-box" id="loadingBox">
            <i class="ri-loader-4-line"></i>
            <p>
                Loading API Data...
            </p>
        </div>
        <div class="error-box" id="errorBox"></div>
        <div class="dashboard-grid">
            <div class="section-card">
                <div class="product-grid" id="productGrid"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/api-integration.js"></script>
</body>
</html>