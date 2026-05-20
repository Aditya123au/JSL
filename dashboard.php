

        <?php include('include/config.php'); ?>
        <?php include('include/sidebar.php'); ?>

        <div class="dashboard-main">

           <?php include('include/topbar.php'); ?>

            <div class="main-panel">

                <div class="welcome-section">

                    <div class="welcome-content">

                        <h1>
                            Welcome Back, Aditya Pandey!
                        </h1>

                        <p>
                            Manage your dashboard, users,
                            analytics and orders from one
                            modern admin panel.
                        </p>

                    </div>

                    <div class="welcome-image">

                        <img src="img/dashboard-banner.png" alt="Dashboard">

                    </div>

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

                        <h2>12,540</h2>

                        <p>Total Users</p>

                    </div>

                    <div class="stats-card">

                        <div class="stats-top">

                            <div class="stats-icon">
                                <i class="ri-shopping-cart-line"></i>
                            </div>

                            <span class="stats-growth">
                                +8%
                            </span>

                        </div>

                        <h2>8,210</h2>

                        <p>Total Orders</p>

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

                        <h2>$24,780</h2>

                        <p>Total Revenue</p>

                    </div>

                    <div class="stats-card">

                        <div class="stats-top">

                            <div class="stats-icon">
                                <i class="ri-line-chart-line"></i>
                            </div>

                            <span class="stats-growth">
                                +20%
                            </span>

                        </div>

                        <h2>78%</h2>

                        <p>Growth Rate</p>

                    </div>

                </div>

                <div class="table-section">

                    <div class="table-header">

                        <h3>
                            Recent Transactions
                        </h3>

                        <button class="table-btn">
                            View All
                        </button>

                    </div>

                    <div class="table-responsive">

                        <table>

                            <thead>

                                <tr>

                                    <th>User</th>

                                    <th>Date</th>

                                    <th>Amount</th>

                                    <th>Status</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>

                                        <div class="user-info">

                                            <?php

                                                $name = "Aditya Sharma";

                                                $nameParts = explode(' ', $name);

                                                $firstLetter =
                                                strtoupper(substr($nameParts[0],0,1));

                                                $secondLetter = '';

                                                if(isset($nameParts[1])){

                                                    $secondLetter =
                                                    strtoupper(substr($nameParts[1],0,1));

                                                }

                                                echo $firstLetter . $secondLetter;

                                            ?>

                                            <span>
                                                Aditya Sharma
                                            </span>

                                        </div>

                                    </td>

                                    <td>
                                        18 May 2026
                                    </td>

                                    <td>
                                        $450
                                    </td>

                                    <td>

                                        <span
                                        class="status completed">

                                            Completed

                                        </span>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <div class="user-info">

                                            <?php

                                                $name = "Rahul Verma";

                                                $nameParts = explode(' ', $name);

                                                $firstLetter =
                                                strtoupper(substr($nameParts[0],0,1));

                                                $secondLetter = '';

                                                if(isset($nameParts[1])){

                                                    $secondLetter =
                                                    strtoupper(substr($nameParts[1],0,1));

                                                }

                                                echo $firstLetter . $secondLetter;

                                            ?>

                                            <span>
                                                Rahul Verma
                                            </span>

                                        </div>

                                    </td>

                                    <td>
                                        17 May 2026
                                    </td>

                                    <td>
                                        $290
                                    </td>

                                    <td>

                                        <span
                                        class="status pending">

                                            Pending

                                        </span>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <div class="user-info">

                                            <?php
                                            $name = "Priya Singh";
                                            $nameParts = explode(' ', $name);
                                            $firstLetter = strtoupper(substr($nameParts[0], 0, 1));
                                            $secondLetter = '';
                                            if (isset($nameParts[1])) {
                                                $secondLetter = strtoupper(substr($nameParts[1], 0, 1));
                                            }
                                            echo $firstLetter . $secondLetter;
                                            ?>

                                            <span>
                                                Priya Singh
                                            </span>

                                        </div>

                                    </td>

                                    <td>
                                        16 May 2026
                                    </td>

                                    <td>
                                        $780
                                    </td>

                                    <td>

                                        <span
                                        class="status processing">

                                            Processing

                                        </span>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        <?php include('include/footer.php'); ?>