
<?php include('include/home_head.php'); ?>
<style><?php include('css/contact.css'); ?></style>
<section class="contact-section">

    <div class="container">

        <!-- LEFT SIDE -->

        <div class="contact-content">

            <span class="mini-title">
                CONTACT ME
            </span>

            <h1 class="main-heading">
                Contact / Inquiry Form
            </h1>

            <p class="contact-text">
                Looking for a frontend, Shopify or
                PHP developer for your next project?
                Let’s discuss your idea.
            </p>

            <div class="info-card">

                <div class="icon-box">
                    <i class="ri-mail-line"></i>
                </div>

                <div>
                    <h3>Email</h3>
                    <p>
                        yourmail@gmail.com
                    </p>
                </div>

            </div>


            <div class="info-card">

                <div class="icon-box">
                    <i class="ri-phone-line"></i>
                </div>

                <div>
                    <h3>Phone</h3>
                    <p>
                        +91 9876543210
                    </p>
                </div>

            </div>


            <div class="info-card">

                <div class="icon-box">
                    <i class="ri-map-pin-line"></i>
                </div>

                <div>
                    <h3>Location</h3>
                    <p>
                        India
                    </p>
                </div>

            </div>

        </div>


        <!-- RIGHT SIDE FORM -->

        <div class="contact-wrapper">

            <form
            id="contactForm"
            class="contact-form">

                <div class="alert-box">
                </div>

                <h2 class="form-heading">
                    Contact / Inquiry Form
                </h2>


                <div class="form-group">
                    <input
                    type="text"
                    name="full_name"
                    id="full_name"
                    class="form-control"
                    placeholder="Your Name">

                    <small
                    class="error-name">
                    </small>
                </div>


                <div class="form-group">
                    <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="Email Address">

                    <small
                    class="error-email">
                    </small>
                </div>


                <div class="form-group">
                    <input
                    type="text"
                    name="phone"
                    id="phone"
                    maxlength="10"
                    class="form-control"
                    placeholder="Phone Number">

                    <small
                    class="error-phone">
                    </small>
                </div>


                <div class="form-group">
                    <textarea
                    id="message"
                    name="message"
                    class="form-control textarea"
                    placeholder="Write Message...">
                    </textarea>

                    <small
                    class="error-message">
                    </small>
                </div>


                <button
                type="submit"
                class="submit-btn">

                    <span class="btn-text">
                        Send Message
                    </span>

                </button>

            </form>

        </div>

    </div>

</section>
<script src="js/main.js"></script>
<script src="js/form.js"></script>
</body>
</html>
