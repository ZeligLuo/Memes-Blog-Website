<?php 
    function getMemes($limit = 12, $offset = 0) {
        global $conn;
        $sql = "SELECT memes.*, users.username, COUNT(*) as cmtcount
                FROM memes 
                JOIN users ON memes.user_id = users.id
                JOIN comments ON memes.id = comments.meme_id
                GROUP BY meme_id
                LIMIT ?,?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    function getMeme($id) {
        global $conn;
        $sql = "SELECT memes.*, users.username, COUNT(*) as cmtcount
                FROM memes 
                JOIN users ON memes.user_id = users.id
                JOIN comments ON memes.id = comments.meme_id
                WHERE memes.id = ?
                GROUP BY meme_id";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    function deleteMeme($id) {
        global $conn;
        $sql = "DELETE FROM memes WHERE memes.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if ($stmt->affected_rows === 1) {
            header("Location: index.php");
        } else {
            header("Location: meme.php?id=" . $id);
        }
    }

?>
