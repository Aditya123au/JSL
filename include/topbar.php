 <header class="dashboard-header">

                <div class="header-left">

                    <button
                    class="sidebar-toggle"
                    id="sidebarToggle">

                        <i class="ri-menu-3-line"></i>

                    </button>

                </div>

                <div class="header-right">

                    <div class="search-box">

                        <i class="ri-search-line"></i>

                        <input
                        type="text"
                        placeholder="Search here...">

                    </div>

                    <div class="profile-box">

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

                        <div>

                            <h5>Aditya</h5>

                            <p>Administrator</p>

                        </div>

                    </div>

                </div>

            </header>