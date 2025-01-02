<?php
$servername = "localhost";
$username = "root";
$password = "avamina1";
$database = "Web_Database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Ma5domen ORDER BY id";
$result = $conn->query($sql);

$rows = array(); // Create an array to store table rows

while ($row = $result->fetch_assoc()) {
    $rows[] = $row; // Add each row to the array
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/aa27b35762.js" crossorigin="anonymous"></script>
<?php echo '<link rel="stylesheet" href="/Web Project/DashBoard.css" />' ?>

<head>
    <script type="text/javascript" src="insta"></script>
    <title>St.Mary website</title>
</head>

<body>
    <div id="header"></div>
    <script>
        fetch("/Web Project/header.php")
            .then((response) => response.text())
            .then((html) => {
                document.getElementById("header").innerHTML = html;
            });
    </script>
    <section class="table-section" id="dash">
        <form action="" method="post" class="form-container" id="search-form">
            <label for="search-btn" class="id-label">ID</label>
            <input type="text" name="search-btn" id="search-btn" />
            <button type="button" id="search-submit">Search</button>
            <a target="_blank" href="./instascan-master/docs/scanner.html"><button type="button" id="scanner" class="scanner-btn">Scanner</button></a>
            <button type="button" id="attend">Attend</button>
            <div class="sort-container">
                <label for="sort-select" class="id-label">Sort by:</label>
                <select id="sort-select">
                    <option value="id">ID</option>
                    <option value="first_name">Name</option>
                    <option value="age">Age</option>
                </select>
                <button type="button" id="sort-btn">Sort</button>
            </div>
        </form>
        <div class="table-container">
            <table class="styled-table" id="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <div id="footer"></div>
    <script>
        fetch("/Web Project/footer.html")
            .then((response) => response.text())
            .then((html) => {
                document.getElementById("footer").innerHTML = html;
            });

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("search-submit").addEventListener("click", function(event) {
                event.preventDefault();
                var searchId = document.getElementById("search-btn").value.trim();
                if (searchId === "") {
                    alert("Please enter a valid ID.");
                    return;
                }
                var tableRows = document.querySelectorAll(".styled-table tbody tr");
                for (var i = 0; i < tableRows.length; i++) {
                    var rowIdElement = tableRows[i].querySelector("td:first-child");
                    var rowId = rowIdElement ? rowIdElement.innerText.trim() : null;


                    if (rowId === searchId) {
                        tableRows[i].scrollIntoView({
                            behavior: "smooth",
                            block: "end",
                            inline: "start"
                        });
                        return;
                    }
                }
                alert("ID not found in the table.");
            });

            document.getElementById("attend").addEventListener("click", function() {
                var searchId = document.getElementById("search-btn").value.trim();
                if (searchId === "") {
                    alert("Please enter a valid ID.");
                    return;
                }

                // Send AJAX request to update the name
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Reload the page to reflect the changes
                            location.reload();
                        } else {
                            // Handle error
                            console.error("Error:", xhr.statusText);
                        }
                    }
                };
                xhr.open("POST", "attend_func.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("id=" + encodeURIComponent(searchId));
            });

            document.getElementById("sort-btn").addEventListener("click", function() {
                var sortBy = document.getElementById("sort-select").value;
                sortTable(sortBy);
            });

            // Other event listeners...
        });

        function sortTable(column) {
            console.log("Sorting table...");
            var sortedRows = <?php echo json_encode($rows); ?>;
            sortedRows.sort(function(a, b) {
                return a[column].localeCompare(b[column]);
            });
            var tbody = document.querySelector(".styled-table tbody");
            tbody.innerHTML = ""; // Clear existing tbody content
            sortedRows.forEach(function(row) {
                var tr = document.createElement("tr");
                tr.innerHTML = "<td>" + row.id + "</td><td>" + row.first_name + "</td><td>" + row.age + "</td>";
                tbody.appendChild(tr);
            });
        }
    </script>
</body>

</html>
