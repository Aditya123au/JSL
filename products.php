<?php include('include/sidebar.php'); ?>
<div class="dashboard-main">
    <?php include('include/topbar.php'); ?>
    <div class="page-container">
        <div class="page-header">
            <div>
                <h1>
                    Products Dashboard
                </h1>
                <p>
                    Dynamic products data table using API
                </p>
            </div>
            <button class="refresh-btn" onclick="loadProducts()">
                Refresh Products
            </button>
        </div>
        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-shopping-bag-line"></i>
                    </div>
                    <span class="stats-growth">
                        +12%
                    </span>
                </div>
                <h2 id="totalProducts">0</h2>
                <p>Total Products</p>
            </div>
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-price-tag-3-line"></i>
                    </div>
                    <span class="stats-growth">
                        +8%
                    </span>
                </div>
                <h2 id="totalCategories">0</h2>
                <p>Categories</p>
            </div>
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-money-dollar-circle-line"></i>
                    </div>
                    <span class="stats-growth">
                        +15%
                    </span>
                </div>
                <h2 id="avgPrice">0</h2>
                <p>Average Price</p>
            </div>
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-store-2-line"></i>
                    </div>
                    <span class="stats-growth">
                        +5%
                    </span>
                </div>
                <h2 id="stockProducts">0</h2>
                <p>In Stock</p>
            </div>
        </div>
        <div class="loading-box" id="loadingBox">
            <i class="ri-loader-4-line"></i>
            <p>
                Loading Products...
            </p>
        </div>
        <div class="error-box" id="errorBox"></div>
        <div class="table-card">
            <div class="table-header">
                <h2>
                    Products List
                </h2>
                <div class="search-box">
                    <i class="ri-search-line"></i>
                    <input type="text" id="searchInput" placeholder="Search products...">
                </div>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Rating</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="productTable"></tbody>
                </table>
            </div>
            <div class="pagination" id="pagination"></div>
        </div>
    </div>
    <div class="modal" id="productModal">
        <div class="modal-content">

            <span class="close-btn" onclick="closeModal()">
                &times;
            </span>

            <h2 id="modalTitle">
                Product Details
            </h2>

            <div class="form-group">
                <label>Title</label>
                <input type="text" id="productTitle">
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" id="productCategory">
            </div>

            <div class="form-group">
                <label>Brand</label>
                <input type="text" id="productBrand">
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" id="productPrice">
            </div>

            <div class="form-group">
                <label>Rating</label>
                <input type="number" step="0.1" id="productRating">
            </div>

            <div class="form-group">
                <label>Stock</label>
                <input type="number" id="productStock">
            </div>

            <div class="form-group">
                <label>Thumbnail URL</label>
                <input type="text" id="productThumbnail">
            </div>

            <button id="saveBtn" onclick="saveProduct()">
                Save Changes
            </button>

        </div>
    </div>
<?php include('include/footer.php'); ?>