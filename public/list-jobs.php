<?php include 'templates/header.php'; ?>
    <main role="main" class="container">

<?php
                                // Include config file
                                require_once "../config/config.php";

                                // Attempt select query execution
                                $sql = "SELECT * FROM jobs";
                                if($result = $link->query($sql)){
                                if($result->rowCount() > 0){

                                    while($row = $result->fetch()){
                                        echo "<div class='jumbotron'>";
                                        echo "<h2>" . $row['job_title'] . "</h2>";
                                        echo "<p style='font-size: 17px' class='lead'>" . $row['description'] . "</p>";
                                        echo "<a class='btn btn-lg btn-primary' href='../public/pages/read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'>Ver Oferta</a>";
                                        echo "</div>";
                                      /*  echo "<a href='../public/pages/update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "<a href='../public/pages/delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";*/
                                        echo "<hr>";
                                    }
                                } else {
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                }}

                                // Close connection
                                unset($link);;
                                ?>

    </main>
</body>
</html>
<?php include 'templates/footer.php';