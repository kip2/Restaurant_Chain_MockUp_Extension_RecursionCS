<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Generate Users</title>
</head>
<body>
    <form action="src/download.php" method="post">
        <label for="count">Input Number of Users: </label>
        <input type="number" id="count" name="count" min="1" max="100" value="5">
        <br/>

        <label for="format">Select Download Format: </label>
        <select name="format">
            <option value="html">HTML</option>
            <option value="markdown">Markdown</option>
            <option value="json">JSON</option>
            <option value="txt">Text</option>
        </select>
        <br/>

        <button type="submit">Generate</button>
    </form>

</body>
</html>