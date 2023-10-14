<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/styles.css">
    <title>Generate Restaurant Chains</title>
</head>
<body>
    
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <section class="flex-column">
            <h1>Randome Restaurant Chain Generator</h1>

            <section class="border-line">
                <form action="download.php" method="post">
                    <!-- total users -->
                    <div class="d-flex justify-content-between">
                        <label for="users">Input Number of Restaurant Chains: </label>
                        <input type="number" id="numberOfChains" name="numberOfChains" min="1" max="100" value="2" required>
                    </div>
                    <br/>

                    <!-- employees of chain  -->
                    <div class="d-flex justify-content-between">
                    <label for="employees">Input Number of Employees: </label>
                    <input type="number" id="numberOfEmployees" name="numberOfEmployees" min="1" max="100" value="2" required>
                    </div>
                    <br/>

                    <!-- range of employee's salary -->
                    <div class="d-flex justify-content-center">
                        <label for="salary">Select Range of Employee's Salary</label>
                    </div>
                    <br/>
                    <div class="d-flex justify-content-between">
                        <label for="minSalary">Minimum Salary: </label>
                        <input type="number" id="minSalary" name="minSalary" min="1" max="9999" value="1" required> 
                        <label for="maxSalary">Maximum Salary: </label>
                        <input type="number" id="maxSalary" name="maxSalary" min="1" max="9999"  value="10" required> 
                    </div>

                    <br/>
                    <!-- total locations -->
                    <div class="d-flex justify-content-between">
                        <label for="locations">Input Number of locations: </label>
                        <input type="number" id="numberOfLocations" name="numberOfLocations" min="1" max="10" value="2" required>
                    </div>
                    <br/>

                    <!-- range of zip code -->
                    <!-- todo: 独自メソッド定義の必要あり？ -->
                    <!-- <label for="zipCode">Select Range of Zip Code: </label>
                    <label for="minZipCode">Minimum Zip Code: </label>
                    <input type="number" id="minZipCode" name="minZipCode" min="0" required> 
                    <label for="maxZipCode">Maximum Zip Code: </label>
                    <input type="number" id="maxZipCode" name="maxZipCode" min="0" required> 

                    <br/> -->

                    <!-- file format select -->
                    <div class="d-flex justify-content-between">
                        <label for="format">Select Download Format: </label>
                        <select name="format">
                            <option value="html">HTML</option>
                            <option value="md">Markdown</option>
                            <option value="json">JSON</option>
                            <option value="txt">Text</option>
                        </select>
                    </div>
                    <br/>

                    <!-- submit button -->
                    <div class="d-flex justify-content-center">
                        <button class="button-shadow" type="submit">Generate</button>
                    </div>
                </form>

                <script src="../js/generate.js"></script>
            </section>
        </section>
    </div>

</body>
</html>