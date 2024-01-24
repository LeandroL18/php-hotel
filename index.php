<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Hotel</title>

        <?php
            $hotels = [

                [
                    'name' => 'Hotel Belvedere',
                    'description' => 'Hotel Belvedere Descrizione',
                    'parking' => true,
                    'vote' => 4,
                    'distance_to_center' => 10.4
                ],
                [
                    'name' => 'Hotel Futuro',
                    'description' => 'Hotel Futuro Descrizione',
                    'parking' => true,
                    'vote' => 2,
                    'distance_to_center' => 2
                ],
                [
                    'name' => 'Hotel Rivamare',
                    'description' => 'Hotel Rivamare Descrizione',
                    'parking' => false,
                    'vote' => 1,
                    'distance_to_center' => 1
                ],
                [
                    'name' => 'Hotel Bellavista',
                    'description' => 'Hotel Bellavista Descrizione',
                    'parking' => false,
                    'vote' => 5,
                    'distance_to_center' => 5.5
                ],
                [
                    'name' => 'Hotel Milano',
                    'description' => 'Hotel Milano Descrizione',
                    'parking' => true,
                    'vote' => 2,
                    'distance_to_center' => 50
                ],

            ];

            $parking = $_GET['parking'] ?? -1;
            $minVote = $_GET['vote'] ?? 1;  
        ?>

    </head>
    <body style="text-align:center; padding-top: 10%;">

        <form>
            <label for="parking">Parking</label>
            <select name="parking">
                <option value="-1">ALL</option>
                <option value="1">YES</option>
                <option value="0">NO</option>
            </select>

            <label style="margin-left: 20px;" for="vote">Vote</label>
            <select name="vote">
                <option value="1">ALL</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <input style="margin-left: 30px;" type="submit" value="FILTER">
        </form>

        <br><br>

        <table border="1" style="margin: 50px auto;">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Parking</th>
                <th>Vote</th>
                <th>Distance to center</th>
            </tr>

            <?php
                foreach($hotels as $hotel) {
                    if  (
                            (
                                $parking == -1                         
                                || ($parking == 1 && $hotel['parking']) 
                                || ($parking == 0 && !$hotel['parking']) 
                            )
                            && $minVote <= $hotel['vote']
                    ) {
            ?>
                        <tr>
                            <td><?php echo $hotel['name'] ?></td>
                            <td><?php echo $hotel['description'] ?></td>
                            <td><?php echo $hotel['parking'] ? "YES" : "NO" ?></td>
                            <td><?php echo $hotel['vote'] ?></td>
                            <td><?php echo $hotel['distance_to_center'] ?>Km</td>
                        </tr>
                <?php 
                    } 
                ?>
            <?php
                }
            ?>
        </table>   
    </body>
</html>