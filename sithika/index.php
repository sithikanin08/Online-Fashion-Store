<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="Athena Home Page">
    <title>Home | Athena Fashions</title>
    <link rel="stylesheet" type="text/css" href="..\sithika\CSS\home.css">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css>
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>

<body>

    <?php include '..\sithika\header.php'; ?>

     <!-- main background video -->
     <section class="background01">
        <div class="videoContainer">
            <video autoplay muted loop class="backgroundVideo">
                <source src="videos/back_vid_03.mp4" type="video/mp4">
                Your browser does not support the video tag.    
            </video>
        </div>

   
        <div class="content">
            <h1>Weaving creativity <br> into every thread,</h1><br>
            <h2>"Fashion is more than style - it's the art of possibillities."</h2>
            <button class="exploreNow" onclick = "explore()">Explore Now</button>
        </div>
    </section>

    <div><hr class="pageDevider"></div>

    <!-- 2nd background canvas -->
    <section class="background02">
        <div>
            <a href="..\sithika\shop_product.php">
                <div class="coverWomen">
                    <h4>Womens</h4>
                </div>
            </a>

            <a href="..\sithika\shop_product.php">
                <div class="coverMen">
                    <h4>Mens</h4>
                </div>
            </a>

            <a href="..\sithika\shop_product.php">
                <div class="coverNewArrive">
                    <h4>New Arrivals</h4>
                </div>
            </a>
        </div>

        <div>
            <p class="para01"><b>OUR NEWEST PRODUCTS STRAIGHT TO YOUR INBOX.</b></p>
            <p class="para02"><b>Be the first to know about our products, limited -time offers, community events, and more.</b></p>
            <input type="emailInput" id="email" placeholder="Enter your email address" class="emailInput" value="">
            <button class="emailButton">Submit</button>
        </div>

    </section>

    <?php include '..\sithika\footer.php'; ?>

</body>

</html>