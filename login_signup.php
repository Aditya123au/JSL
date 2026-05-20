<!-- login.php -->
<?php include('include/home_head.php'); ?>

        <section class="auth-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">

                    <!-- Left Image -->
                    <div class="col-lg-6 auth-image text-center login-card">
                        <img src="/JSL_task/img/auth-img.png" alt="Authentication Image">
                    </div>
                    <div class="col-lg-6 auth-image text-center signup-card">
                        <img src="/JSL_task/img/signup-img.png" alt="Sign Up Image">
                    </div>

                    <!-- Login Form and Signup Form HTML Logic Start -->

                    <div class="col-lg-5">                
                        <div class="auth-card ">
                            <div class="col-12 text-center mb-4">
                                <button class="btn btn-outline-primary text-uppercase justify-content-start" id="showLogin">Login</button>
                                <button class="btn btn-outline-primary text-uppercase justify-content-end" id="showSignup">Sign Up</button>
                            </div>
                            <div class="auth-card login-card">
                                <p class="auth-desc">
                                    Welcome back! Please login to your account.
                                </p>

                                <div class="alert alert-danger alert-box"></div>

                                <form id="loginForm">

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label class="mb-2">Email Address</label>
                                        <input 
                                            type="email" 
                                            class="form-control"
                                            name="email"
                                            placeholder="Enter your email"
                                            required
                                        >
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label class="mb-2">Password</label>

                                        <div class="password-box">
                                            <input 
                                                type="password" 
                                                class="form-control"
                                                name="password"
                                                id="password"
                                                placeholder="Enter your password"
                                                required
                                            >
                                            <i class="ri-eye-line toggle-password"></i>
                                        </div>
                                    </div>
                                    <!-- Remember -->
                                    <div class="d-flex justify-content-between mb-4">
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox"
                                                name="remember"
                                                id="remember"
                                            >

                                            <label class="form-check-label" for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                        <a href="#">Forgot Password?</a>
                                    </div>

                                    <!-- Button -->
                                    <button type="submit" class="btn-login">
                                        <span class="btn-text">Login</span>
                                    </button>
                                </form>

                            </div>
                            <div class="signup-card">                   
                                <p class="auth-desc">
                                    Create a new account.
                                </p>
                                <div class="alert alert-danger alert-box"></div>
                                <form id="signupForm">
                                    <div class="mb-3">
                                        <input 
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            id="name"
                                            placeholder="Enter your name"
                                            required
                                        >
                                        <small class="text-danger error-name"></small>
                                    </div>

                                    <div class="mb-3">
                                        <input 
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            id="email"
                                            placeholder="Enter your email"
                                            required
                                        >
                                        <small class="text-danger error-email"></small>
                                    </div>
                                    <div class="mb-3">
                                        <input 
                                            type="text"
                                            class="form-control"
                                            name="phone"
                                            id="phone"
                                            maxlength="10"
                                            placeholder="Enter your phone number"
                                            required
                                        >
                                        <small class="text-danger error-phone"></small>
                                    </div>
                                    <div class="mb-3">
                                        <div class="password-box">
                                            <input 
                                                type="password"
                                                class="form-control"
                                                name="password"
                                                id="password"
                                                placeholder="Enter your password"
                                                required
                                            >
                                            <i class="ri-eye-line toggle-password"></i>
                                        </div>
                                        <small class="text-danger error-password"></small>
                                    </div>
                                    <div class="mb-3">
                                        <div class="password-box">
                                            <input 
                                                type="password"
                                                class="form-control"
                                                name="confirm_password"
                                                id="confirm_password"
                                                placeholder="Confirm your password"
                                                required
                                            >
                                            <i class="ri-eye-line toggle-password"></i>
                                        </div>
                                        <small class="text-danger error-confirm-password"></small>
                                    </div>
                                    <div class="alert alert-danger alert-box" style="display:none;"></div>
                                    <button type="submit" class="btn-login">
                                        <span class="btn-text">Sign Up</span>
                                    </button>
                                </form>
                            </div>
                        </div>                
                    </div>
                    
                    <!-- Login Form and Signup Form HTML Logic End -->

                </div>
            </div>
        </section>
        <div class="copyright">
            Copyright © 2026. All rights reserved.
        </div>
        
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/login.js"></script>

</body>

</html>