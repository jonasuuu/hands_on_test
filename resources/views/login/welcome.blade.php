<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Hands on test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <script src="https://www.paypal.com/sdk/js?client-id=AY-tWB6ssB3sBXALeDhTu9MQ8hfN0DRHqEKhL3Ehx5PIXkZj-JkeRPIHiZq4OhHx16xdS-A60mOID1XA"> // Replace YOUR_CLIENT_ID with your sandbox client ID
    </script>
  
  <div class="flex-center position-ref full-height">
    <div class="top-right links">
        <a href="{{ url('/') }}">Log out</a>
    </div>
        <div class="content">
            <div class="title m-b-md">
                 welcome {{$username}} 
            </div>
            <form action="/sent" method="post" style="margin-bottom: 50px;"> 
                @csrf <!-- {{ csrf_field() }} -->
                <label>Ammount</label>
                <input type="number"  id="amt" required="" min="1" >
                <br>
            </form>
            <div id="paypal-button-container"></div>
        </div>
    </div>
    <!-- Add the checkout buttons, set up the order and approve the order -->
    <script>
        var amt = document.getElementById("amt");
        paypal.Buttons({
            style: {
                layout:  'vertical',
                color:   'blue',
                shape:   'rect',
                label:   'paypal'
            },  
            createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: amt.value
                }
                }]
            });
            },
            onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
            });
            }
        }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
    </body>
</html>
