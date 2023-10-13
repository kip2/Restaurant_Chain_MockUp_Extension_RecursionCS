<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Generate Users</title>
</head>
<body>
    
    <form action="src/download.php" method="post">
        <!-- total users -->
        <label for="users">Input Number of Users: </label>
        <input type="number" id="numberOfUsers" name="numberOfUsers" min="1" max="100" value="5" required>
        <br/>

        <!-- employees of chain  -->
        <label for="employees">Input Number of Employees: </label>
        <input type="number" id="numberOfEmployees" name="numberOfEmployees" min="1" max="100" value="5" required>
        <br/>

        <!-- range of employee's salary -->
        <label for="salary">Select Range of Employee's Salary: </label>
        <label for="minSalary">Minimum Salary: </label>
        <input type="number" id="minSalary" name="minSalary" min="1" max="9999" required> 
        <label for="maxSalary">Maximum Salary: </label>
        <input type="number" id="maxSalary" name="maxSalary" min="1" max="9999" required> 

        <br/>
        <!-- total locations -->
        <label for="locations">Input Number of locations: </label>
        <input type="number" id="numberOfLocations" name="numberOfLocations" min="1" max="10" value="5" required>
        <br/>

        <!-- range of zip code -->
        <!-- todo: 独自メソッド定義の必要あり？ -->
        <label for="zipCode">Select Range of Zip Code: </label>
        <label for="minZipCode">Minimum Zip Code: </label>
        <input type="number" id="minZipCode" name="minZipCode" min="0" required> 
        <label for="maxZipCode">Maximum Zip Code: </label>
        <input type="number" id="maxZipCode" name="maxZipCode" min="0" required> 

        <br/>
        <!-- file format select -->
        <label for="format">Select Download Format: </label>
        <select name="format">
            <option value="html">HTML</option>
            <option value="markdown">Markdown</option>
            <option value="json">JSON</option>
            <option value="txt">Text</option>
        </select>
        <br/>

        <!-- submit button -->
        <button type="submit">Generate</button>
    </form>

    <script src="../js/generate.js"></script>

</body>
</html>