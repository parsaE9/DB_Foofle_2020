<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Sender</th>
        <th>Title</th>
        <th>Date</th>
        <th>All Receivers</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $username = $_SESSION['username'];
    $sql = "CALL mail_see_sent_mails()";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $q->fetch()) {
        $mail_ID = $row["mail_ID"];
        $sender = $row["sender_"];
        $title = $row["title"];
        $date = $row["date"];
        $content = $row["content"];
        $receiver = $row["rcv"];

        echo "<tr>";
        echo "<td>$sender</td>";
        echo "<td>$title</td>";
        echo "<td>$date</td>";
        echo "<td>$receiver</td>";
        echo "<td><a ' onclick=\"javascript : return alert('content : {$content}'); \">See Content</a></td>";
        echo "<td><a href='mail.php?delete={$mail_ID}' onclick=\"javascript : return confirm('Are you sure you want to delete this email'); \">Delete</a></td>";
        echo "</tr>";

    }
    ?>
    </tbody>
</table>
