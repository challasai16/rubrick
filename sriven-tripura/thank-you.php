<!DOCTYPE html>
<html lang="en">

<head>
    <style>

    </style>
    <!-- Event snippet for Thank you conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-16616948923/_ZkOCNmQxMMZELuJyvM9',
      'value': 1.0,
      'currency': 'INR'
  });
</script>
</head>

<body class="home">
    <?php include ("thankyou-header.php") ?>

    <section class="cardth">
        <div class="row mb30">
            <div class="col-md-12 mb20 mt20 typ">
                <h2 class="typh2">Thank you for contacting us... !!!</h2>
            </div>
        </div>
        <p class="para">We will get back to you soon.</p>
        <div class="button-container">
            <a href="index.php" class="home-button">Click to Home</a>
            <a href="Tripura_Brochure.pdf" class="bro">Download Brochure
                <i class="fa fa-download"></i></a>
        </div>
    </section>

    <section class="social-icon-section desk-none">
        <div class="container ftop"></div>
    </section>

    <?php include ("thankyou-footer.php") ?>
    <script>
        const api = "https://agility-fun-253--dev.sandbox.my.salesforce-sites.com/services/apexrest/leadservice"

        const response = fetch(api)

        console.log(response)
    </script>
</body>

</html>