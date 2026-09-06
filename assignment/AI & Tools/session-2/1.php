<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "spotify_demo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CREATE
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare(
        "INSERT INTO playlists (name, description) VALUES (?, ?)"
    );
    $stmt->bind_param("ss", $name, $description);
    $stmt->execute();
    $stmt->close();

    header("Location: playlist_crud.php");
    exit;
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare(
        "UPDATE playlists SET name = ?, description = ? WHERE id = ?"
    );
    $stmt->bind_param("ssi", $name, $description, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: playlist_crud.php");
    exit;
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $conn->prepare(
        "DELETE FROM playlists WHERE id = ?"
    );
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: playlist_crud.php");
    exit;
}

// READ
$result = $conn->query(
    "SELECT id, name, description FROM playlists ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Playlist CRUD</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            color: #1db954;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            background: #1db954;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background: #1db954;
            color: white;
        }

        .delete {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>🎵 Playlist Management</h1>

    <!-- CREATE -->
    <h2>Create Playlist</h2>

    <form method="POST">

        <label>Playlist Name</label>

        <input
            type="text"
            name="name"
            placeholder="Enter playlist name"
            required
        >

        <label>Description</label>

        <textarea
            name="description"
            placeholder="Enter playlist description"
        ></textarea>

        <button type="submit" name="create">
            Create Playlist
        </button>

    </form>


    <!-- READ -->
    <h2>All Playlists</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>

        <tr>

            <td>
                <?= htmlspecialchars($row['id']) ?>
            </td>

            <td>
                <?= htmlspecialchars($row['name']) ?>
            </td>

            <td>
                <?= htmlspecialchars($row['description']) ?>
            </td>

            <td>

                <a href="?edit=<?= $row['id'] ?>">
                    Edit
                </a>

                |

                <a
                    class="delete"
                    href="?delete=<?= $row['id'] ?>"
                    onclick="return confirm('Delete this playlist?')"
                >
                    Delete
                </a>

            </td>

        </tr>

        <?php endwhile; ?>

    </table>


    <!-- UPDATE -->
    <?php

    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];

        $stmt = $conn->prepare(
            "SELECT id, name, description
             FROM playlists
             WHERE id = ?"
        );

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $editResult = $stmt->get_result();
        $playlist = $editResult->fetch_assoc();

        $stmt->close();

        if ($playlist):

    ?>

    <h2>Edit Playlist</h2>

    <form method="POST">

        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($playlist['id']) ?>"
        >

        <label>Playlist Name</label>

        <input
            type="text"
            name="name"
            value="<?= htmlspecialchars($playlist['name']) ?>"
            required
        >

        <label>Description</label>

        <textarea name="description"><?= htmlspecialchars($playlist['description']) ?></textarea>

        <button type="submit" name="update">
            Update Playlist
        </button>

    </form>

    <?php
        endif;
    }
    ?>

</div>

</body>
</html>

<?php
$conn->close();
?>