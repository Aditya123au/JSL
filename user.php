<?php include('include/config.php'); ?>
<?php include('include/sidebar.php'); ?>
<div class="dashboard-main">
    <?php include('include/topbar.php'); ?>
    <div class="page-container">
        <div class="page-header">
            <div>
                <h1>
                    Users Dashboard
                </h1>
                <p>
                    Dynamic users data table using API
                </p>
            </div>
            <button class="refresh-btn" onclick="loadUsers()">
                Refresh Users
            </button>
        </div>
        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-user-line"></i>
                    </div>
                    <span class="stats-growth">
                        +12%
                    </span>
                </div>
                <h2 id="totalUsers">0</h2>
                <p>Total Users</p>
            </div>
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-men-line"></i>
                    </div>
                    <span class="stats-growth">
                        +8%
                    </span>
                </div>
                <h2 id="maleUsers">0</h2>
                <p>Male Users</p>
            </div>
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-women-line"></i>
                    </div>
                    <span class="stats-growth">
                        +15%
                    </span>
                </div>
                <h2 id="femaleUsers">0</h2>
                <p>Female Users</p>
            </div>
            <div class="stats-card">
                <div class="stats-top">
                    <div class="stats-icon">
                        <i class="ri-map-pin-user-line"></i>
                    </div>
                    <span class="stats-growth">
                        +5%
                    </span>
                </div>
                <h2 id="countries">0</h2>
                <p>Countries</p>
            </div>
        </div>
        <div class="loading-box" id="loadingBox">
            <i class="ri-loader-4-line"></i>
            <p>
                Loading Users...
            </p>
        </div>
        <div class="error-box" id="errorBox"></div>
        <div class="table-card">
            <div class="table-header">
                <h2>
                    Users List
                </h2>
                <div class="search-box">
                    <i class="ri-search-line"></i>
                    <input type="text" id="searchInput" placeholder="Search users...">
                </div>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>City</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="userTable"></tbody>
                </table>
            </div>
            <div class="pagination" id="pagination"></div>
        </div>
    </div>
    <div class="modal" id="userModal">

        <div class="modal-content">

            <span
            class="close-btn"
            onclick="closeUserModal()">
                &times;
            </span>

            <h2 id="userModalTitle">
                User Details
            </h2>

            <div class="form-group">
                <label>First Name</label>
                <input type="text" id="userFirstName">
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" id="userLastName">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" id="userEmail">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" id="userPhone">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <input type="text" id="userGender">
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" id="userCity">
            </div>

            <div class="form-group">
                <label>Company</label>
                <input type="text" id="userCompany">
            </div>

            <button
            id="saveUserBtn"
            onclick="saveUser()">
                Save Changes
            </button>

        </div>

    </div>
    <?php include('include/footer.php'); ?>    