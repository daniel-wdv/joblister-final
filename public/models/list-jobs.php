<?php include '../templates/header.php'; ?>


    <main role="main" class="container">
        <div class="order-by-div">
            <select class="order-by-select" id="orderby" name="orderby">
                <label for="orderby"></label>
                <option value="Mais Recentes">Mais Recentes</option>
                <option value="Mais Antigas">Mais Antigas</option>
            </select>
        </div>


                                <?php
                                // Include config file
                                require_once "../../config/config.php";


                                // Attempt select query execution
                                $sql = "SELECT * FROM jobs ORDER BY post_date DESC ";
                                if($result = $link->query($sql)){
                                if($result->rowCount() > 0){

                                    while($row = $result->fetch()){
                                        echo "<div class='jumbotron jobs-box'>";
                                        $format_date = strtotime($row['post_date']);
                                        echo "<h4 class='list-jobs-date'>" . "<svg class='svg-size-2' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z' clip-rule='evenodd'></path></svg>" . " " . date('Y-m-d', $format_date ) . "</h4>";
                                        echo "<h2>" . $row['job_title'] ."</h2><hr>";
                                        echo "<h4>" . $row['company'] . " - " . "<svg class='svg-size-2' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z' clip-rule='evenodd'></path></svg>" . " " . $row['location'] ."</h4></br>";
                                        echo "<p style='font-size: 17px' class='lead'>" . substr($row['description'], 0, 400) . ' ...' . "</p>";
                                        echo "<a class='button-style btn btn-lg' href='../views/read.view.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'>Ver Oferta</a>";
                                        echo "</div>";
                                        echo "<hr>";
                                    }
                                } else {
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                }}

                                // Close connection
                                unset($link);;
                                ?>
    </main>

<?php include '../templates/footer.php';