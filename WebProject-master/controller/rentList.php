<?php
    function listFromDB($city,$takeTime,$dropTime) {
        $db = mysqli_connect("localhost","root","","car_rent");
        $takeTime = date("Y-m-d", strtotime($takeTime));
        $dropTime = date("Y-m-d", strtotime($dropTime)); 
        $query = "SELECT * from cars where id NOT IN (SELECT carID from rentedcars WHERE (('$takeTime' <= dropTime) AND ('$dropTime' >= takeTime)) AND isCancelled=0)";
        $result = mysqli_query($db,$query);
        while($row = mysqli_fetch_array($result)){
          $brand = $row['carBrand'];
          $carID = $row['id'];
          $carPrice = $row['carPrice'];
          $deposit = $row['deposit'];
          $userID = $_SESSION['user'];

          echo "
            <div class='card'>
            <img src='images/".$row['photoPath']."' alt='Car PNG' style='width: 250px; height: 130px;object-fit:scale-down;'>
            <h1>".$row['carBrand']."</h1>
            <p class='deposit'> Deposit <br> $".$row['deposit']." <p>
            <p class='pricePerDay'> Price Per Day <br> $".$row['carPrice']."</p>
            <p class='pricePerDay'> Total Price (For 30 Day) <br> $".($row['carPrice']*30)." </p>
        
            <i class='fas fa-cogs'>".$row['gear']."    <i class='fas fa-gas-pump'></i> ".ucfirst($row['fuel'])." </i>

            <p><button onclick=overlayON(\"$city\",$userID,$carID,\"$brand\",\"$takeTime\",\"$dropTime\",$carPrice)> Rent Car Now </button></p>
          </div>
          
          ";
 

        }
    }

    function getmail(){
      $db = mysqli_connect("localhost","root","","car_rent");
      $query = "SELECT email from user where id=".$_SESSION['user'];
      $result = mysqli_query($db,$query);
      $row = mysqli_fetch_array($result);
      echo $row['email'];
    }

    function getRentedCars(){
      $db = mysqli_connect("localhost","root","","car_rent");
      $query = "SELECT takeTime,dropTime,money,isCancelled,carBrand,photoPath,deposit,rentedcars.id as id FROM rentedcars,cars WHERE rentedcars.carID=cars.id AND userID=".$_SESSION['user'];
      $result = mysqli_query($db,$query);
      while($row = mysqli_fetch_array($result)){
        $photo = $row['photoPath'];
        $brand = strtoupper($row['carBrand']);
        $takeTime = $row['takeTime'];
        $dropTime = $row['dropTime'];
        $money = $row['money'];
        $deposit = $row['deposit'];
        $rentID = $row['id'];
        if($row['isCancelled']==1){
          echo "
          <div style=' margin:5px';>
            <div style='width:20%; display:inline-block'>
              <img src='./images/$photo' alt='Car PNG' style='width:100%;'>
              <p style='text-align: center; color:#232323'>$brand</p>
            </div>
            <div class='rentedCarsInfoCont' style='width:75%; display:inline-block'>
              <p class='rentedCarsInfo'>$takeTime</p>
              <p class='rentedCarsInfo'>$dropTime</p>
              <p class='rentedCarsInfo' style='text-decoration: line-through;'>$money\$</p>
              <p class='rentedCarsInfo' style='text-decoration: line-through;'>$deposit\$</p>
              <Button disabled id='rentedCarsButton'>Canceled</Button>
            </div>
          </div>
        ";
        }else{
          echo "
            <div style=' margin:5px';>
              <div style='width:20%; display:inline-block'>
                <img src='./images/$photo' alt='Car PNG' style='width:100%;'>
                <p style='text-align: center; color:#232323'>$brand</p>
              </div>
              <div class='rentedCarsInfoCont' style='width:75%; display:inline-block'>
                <p class='rentedCarsInfo'>$takeTime</p>
                <p class='rentedCarsInfo'>$dropTime</p>
                <p class='rentedCarsInfo'>$money\$</p>
                <p class='rentedCarsInfo'>$deposit\$</p>
                <Button id='rentedCarsButton' onclick=cancelRent($rentID)>Cancel</Button>
              </div>
            </div>
          ";
        }



      }
    }

    function getCars(){
      $db = mysqli_connect("localhost","root","","car_rent");
      $query = "SELECT * from cars";
      $result = mysqli_query($db,$query);
      while($row = mysqli_fetch_array($result)){
          echo "
        <div class='flip-card'>
          <div class='flip-card-inner'>
            <div class='flip-card-front'>
              <img src='images/".$row['photoPath']."' alt='Avatar' style='height:300px; width:400px; object-fit:scale-down;'>
            </div>
            <div class='flip-card-back'>
              <div style='display:inline-block; position:relative; top:29%'>
                <i class='fas fa-car fa-2x'></i> 
              </div>
              <div class='flip-card-back-info' style='display:inline-block'>
                <h1>".$row['carBrand']."</h1>
                <h1>".$row['carName']."</h1> 
              </div>

              <p><i class='fas fa-gas-pump fa-lg'></i> ".ucfirst($row['fuel'])."</p> 
              <p><i class='fas fa-cogs fa-lg'></i> ".ucfirst($row['gear'])."</p>
            </div>
          </div>
        </div>";
      }
    }

?>