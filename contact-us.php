<?php include './components/header.php'; ?>

<div class="ui container">

    <!-- Top Navigation Bar -->
    <?php include './components/top-menu.php'; ?>

    <!-- BODY Content -->
    <div class="ui grid">
        <div class="sixteen wide column">
            <h2 class="ui header">Contact Us</h2>

            <form class="ui form" method="POST" action="contact-handler.php">
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Your full name" required>
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Your email address" required>
                </div>
                <div class="field">
                    <label>Subject</label>
                    <input type="text" name="subject" placeholder="Subject" required>
                </div>
                <div class="field">
                    <label>Message</label>
                    <textarea name="message" rows="4" placeholder="Your message" required></textarea>
                </div>
                <button class="ui primary button" type="submit">Send Message</button>
            </form>
        </div>
    </div>

</div>

<?php include './components/footer.php'; ?>
