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
        <?php include './components/top-menu.php'; ?>

        
            
            <!-- right content -->
            <div class="twelve wide column">
                <h1>Feed Back</h1>


                <?php
                    if(isset($_POST['submit_feedback'])) {
                        $name = $_POST['full_name'];
                        $address = $_POST['full_address'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $comment = $_POST['comment'];

                        $sql = "INSERT INTO feedback (full_name, full_address, phone, email, comment) 
                                VALUES ('$name', '$address', '$phone', '$email', '$comment')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script> alert('Feedback successfully sent'); </script>";
                        } else {
                            echo "<script> alert('Error in Insertion'); </script>";
                        }
                        
                        $conn->close();


                    }

                ?>


                <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">
                    <div class="field">
                        <label>Name</label>
                        <input type="text" name="full_name" placeholder="Full Name" required>
                    </div>
                    <div class="field">
                        <label>Address</label>
                        <div class="field">
                          <div class="sixteen wide field">
                            <input type="text" name="full_address" placeholder="Address" required>
                          </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Phone No.</label>
                        <div class="field">
                          <div class="eight wide field">
                            <input type="tel" name="phone" placeholder="Phone / Mobile" required>
                          </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Email Address</label>
                        <div class="field">
                          <div class="eight wide field">
                            <input type="email" name="email" placeholder="Email ID" required>
                          </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Comments</label>
                        <textarea rows="2" name="comment" required></textarea>
                    </div>
                    <button name="submit_feedback" class="ui primary button" type="submit">Submit</button>
                    <button class="ui button" type="reset">Reset</button>
                </form>

                <span class="p-20"></span>

            </div>
        </div>

    </div>
    
<?php include './components/footer.php'; ?>