<!DOCTYPE html>
<html>
<head>
    <title>Add Restaurant</title>
</head>
<body>

    <h1>Add New Restaurant</h1>

    <form method="POST" action="/restaurant">
        @csrf

        <label for="name">Restaurant Name:</label>
        <input type="text" id="name" name="name" required>

        <br><br>

        <label for="cuisine">Cuisine:</label>
        <input type="text" id="cuisine" name="cuisine" required>

        <br><br>

        <button type="submit">Add Restaurant</button>
    </form>

</body>
</html> 