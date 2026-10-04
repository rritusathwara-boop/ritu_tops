<!DOCTYPE html>
<html>
<head>
    <title>Today's Offers</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    
    <h1>Today's Offers</h1>

    <a href="{{ route('today.offers') }}">
      View Today's Offers
    </a>

    //session-4 Task-3
    <h1>Special Offers </h1>
    <div class="offer-box">
       @if ($discount > 20)
            <p>Special Offer!</p>
        @endif
    </div>

</body>
</html>