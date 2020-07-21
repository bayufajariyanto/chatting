<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Chatbox with AJAX</title>
    <link href="style.css">
</head>

<body>
    <div id="container">

        <div id="chat_box">
            <div id="chat"></div>
        </div>

        <form action="<?= $tambah; ?>" method="post">
            <input type="text" name="pesan" placeholder="Enter name">
        </form>
    </div>
</body>

</html>