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

        <form action="" method="post" name="form1">
            <input type="text" name="chatname" placeholder="Enter name"><br>
            <textarea name="message" placeholder="Enter message"></textarea><br>
            <a href="#" onclick="insert()">Send It</a>
        </form>
    </div>
    <script src="ajax.js"></script>
</body>

</html>