<?php
$creators = [
    [
        "Name" => "Ritu Sathwaraa",
        "Platform" => "Instagram",
        "Followers" => 8500
    ],
    [
        "Name" => "Ayushi",
        "Platform" => "YouTube",
        "Followers" => 25000
    ],
    [
        "Name" => "Neha Verma",
        "Platform" => "Facebook",
        "Followers" => 12000
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Profiles</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Creator Profiles</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Platform</th>
        <th>Followers</th>
    </tr>

    <?php foreach ($creators as $creator) 
	{ 
	?>
        <tr>
            <td><?php echo $creator['Name']; ?></td>
            <td><?php echo $creator['Platform']; ?></td>
            <td><?php echo $creator['Followers']; ?></td>
        </tr>
    <?php 
	} 
	?>

</table>

</body>
</html>