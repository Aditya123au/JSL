<?php include('include/sidebar.php'); ?>
<div class="dashboard-main">
    <?php include('include/topbar.php'); ?>
    <div class="page-container">
        <div class="page-header">
            <div>
                <h1>
                    News Dashboard
                </h1>
                <p>
                    Dynamic news data table using API
                </p>
            </div>
            <button class="refresh-btn" onclick="loadNews()">
                Refresh News
            </button>
        </div>
        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-newspaper-line"></i>
                    </div>
                    <span class="stats-growth">
                        +12%
                    </span>
                </div>
                <h2 id="totalNews">0</h2>
                <p>Total News</p>
            </div>
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-article-line"></i>
                    </div>
                    <span class="stats-growth">
                        +8%
                    </span>
                </div>
                <h2 id="totalTags">0</h2>
                <p>Total Tags</p>
            </div>
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-eye-line"></i>
                    </div>
                    <span class="stats-growth">
                        +15%
                    </span>
                </div>
                <h2 id="avgViews">0</h2>
                <p>Average Views</p>
            </div>
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-thumb-up-line"></i>
                    </div>
                    <span class="stats-growth">
                        +5%
                    </span>
                </div>
                <h2 id="totalLikes">0</h2>
                <p>Total Likes</p>
            </div>
        </div>
        <div class="loading-box" id="loadingBox">
            <i class="ri-loader-4-line"></i>
            <p>
                Loading News...
            </p>
        </div>
        <div class="error-box" id="errorBox"></div>
        <div class="table-card">
            <div class="table-header">
                <h2>
                    News List
                </h2>
                <div class="search-box">
                    <i class="ri-search-line"></i>
                    <input type="text" id="searchInput" placeholder="Search news...">
                </div>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>News</th><th>Category</th><th>Views</th><th>Likes</th><th>Dislikes</th><th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="newsTable"></tbody>
                </table>
            </div>
            <div class="pagination" id="pagination"></div>
        </div>
    </div>
    <?php include('include/footer.php'); ?>