<?php include './components/header.php'; ?>
     <?php include './components/top-menu.php'; ?>
	 
	 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sponsored Children - Creative Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(to right, #e0ecf8, #f9fcff);
            font-family: 'Segoe UI', sans-serif;
        }

        .gallery-title {
            font-weight: 600;
            color: #17375e;
        }

        .card-container {
            perspective: 1000px;
        }

        .card-flip {
            transition: transform 0.8s;
            transform-style: preserve-3d;
            position: relative;
            height: 320px;
        }

        .card-container:hover .card-flip {
            transform: rotateY(180deg);
        }

        .card-front, .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 16px;
            backface-visibility: hidden;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        }

        .card-front {
            background-color: #fff;
            padding: 20px;
            text-align: center;
        }

        .card-back {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(8px);
            transform: rotateY(180deg);
            padding: 20px;
        }

        .child-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #e2eafc;
            margin-top: 10px;
        }

        .child-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 10px;
        }

        .info-line {
            font-size: 0.9rem;
            color: #333;
            margin: 5px 0;
        }

        .badge {
            font-size: 0.75rem;
        }

        .sponsor-title {
            font-weight: 600;
            color: #0d6efd;
        }

        .tab-custom .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
            font-weight: 500;
        }

        .tab-custom .nav-link {
            color: #0d6efd;
        }

    </style>
</head>
<body>


<div class="ui container">

    <!-- Top Navigation Bar -->
  

    <!-- BODY Content -->
    <div class="ui grid">

        <!-- Left Content (Optional for sidebars) -->
        <div class="four wide column">
            <!-- You can add sidebar or quick links here -->
           
        </div>

        <!-- Right Content (Main Content) -->
        <div class="twelve wide column">
            <h1>Our Programs</h1>
            
            <p><strong>CCDF</strong> is a non-profit, non-governmental, and voluntary organization committed to the care and development of underprivileged children. We focus on providing support to children in need through various programs, including education, healthcare, and vocational training.</p>

            <p><strong>Our Mission</strong>: To guide and motivate individuals to use their resources in a constructive way, changing the lives of underprivileged children and enabling them to realize their full potential.</p>
            
            <h2 id="education">Education Programs</h2>
            <p>We believe that education is the key to breaking the cycle of poverty. Our educational initiatives focus on providing quality schooling, tutoring, and extracurricular activities for underprivileged children. Through our programs, children gain the skills and knowledge necessary to create a brighter future for themselves.</p>

            <h2 id="healthcare">Healthcare Initiatives</h2>
            <p>Our healthcare programs focus on providing basic medical services, vaccinations, and health awareness to children in need. We aim to improve the overall well-being of these children, ensuring they grow up healthy and strong.</p>

            <h2 id="donate">How You Can Help</h2>
            <p>There are many ways you can make a difference in the lives of underprivileged children. By donating, volunteering, or spreading awareness, you can contribute to our cause. Your support helps us continue our work and expand our reach.</p>

            <p><a href="donation.php" class="ui button primary">Donate Now</a></p>

            <span class="p-20"></span>
        </div>

    </div>

</div>

<!-- Embedded CSS -->
<style>
    /* Make the page responsive using Flexbox for better layout management */
    .ui.grid {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .ui.grid > .column {
        flex: 1 1 100%; /* Ensure full width on smaller screens */
        min-width: 300px; /* Set a minimum width for the columns */
    }

    .four.wide.column {
        flex: 1 1 25%; /* Sidebar takes 25% width on larger screens */
    }

    .twelve.wide.column {
        flex: 1 1 75%; /* Main content takes 75% width on larger screens */
    }

    /* Stacking the content on smaller screens */
    @media (max-width: 768px) {
        .four.wide.column {
            display: none; /* Hide the sidebar on smaller screens */
        }

        .twelve.wide.column {
            flex: 1 1 100%; /* Main content takes full width */
        }
    }

    .ui.container {
        max-width: 100%;
        padding: 20px;
    }

    .ui.header {
        font-size: 2rem;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 1.5rem;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    p {
        font-size: 1.125rem;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .ui.button.primary {
        margin-top: 20px;
        background-color: #4CAF50; /* Green button */
        color: white;
        transition: background-color 0.3s ease;
    }

    .ui.button.primary:hover {
        background-color: #45a049; /* Darker green on hover */
    }

    /* Add padding for content sections */
    .p-20 {
        padding-bottom: 20px;
    }

    /* Vertical menu styling for the sidebar */
    .ui.vertical.menu {
        margin-top: 30px;
    }

    .ui.menu a {
        font-size: 1rem;
        transition: color 0.3s ease;
    }

    .ui.menu a:hover {
        color: #4CAF50; /* Green on hover */
    }

    /* Animation for quick links in sidebar */
    .ui.menu a {
        opacity: 0;
        animation: fadeIn 0.5s ease-in-out forwards;
    }

    .ui.menu a:nth-child(1) {
        animation-delay: 0.2s;
    }
    .ui.menu a:nth-child(2) {
        animation-delay: 0.4s;
    }
    .ui.menu a:nth-child(3) {
        animation-delay: 0.6s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Add smooth transition for page sections */
    h2, p {
        transition: transform 0.3s ease-in-out;
    }

    h2:hover, p:hover {
        transform: translateX(10px); /* Slight hover effect */
    }
</style>

<?php include './components/footer.php'; ?>
