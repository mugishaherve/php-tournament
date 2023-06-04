<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Team management menu</title>
    <link rel="stylesheet" href="yourTeam.css" />
  </head>
  <body>
    <div class="body">
      <div class="header">
        <div class="user_dash">
          <h1>TOURNMENT MANAGEMENT</h1>
        </div>
        <?php
          include '../../../header/header.php';
        ?>
      </div>

      <div class="body-lay">
        <div class="menu">
          <div class="menu-top">
            <div class="menu-top-container">
              <h5>Management Menu</h5>
            </div>

            <?php
              include '../../../backend/sidebar/sidebar.php';
            ?>
          </div>

          <div class="menu-bottom">
            <div class="menu-bottom-container">
              <h5 class="menu-bottom-container-heading">Categories</h5>
            </div>
            <div class="menu-bottom-container-two">
              <ul class="menu-items">
                <li>All</li>
                <li>Attacking Midfielder(AM)</li>
                <li>Central Defensive(CB)</li>
                <li>Central Forward(CF)</li>
                <li>Fluidfying Full-Back(WB)</li>
                <li>Forward Wing(WF)</li>
                <li>Full Back(SB)</li>
                <li>GoalKeeper(GK)</li>
                <li>Lateral Midfielder(SM)</li>
                <li>Libero(SW)</li>
                <li>Median(DM)</li>
                <li>Midfielder(CM)</li>
                <li>Secondary Striker(SS)</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="body-content">
          <div class="body-content-top">
            <div class="body-content-top-header">
              <h4>Bayer Leverkusen FuBball</h4>
              <div>
                <h4>MONEY: <span>$ 50000.00</span></h4>
              </div>

              <div>
                <h4>MEMBERSHIP PLAYERS: <span>0 / 32</span></h4>
              </div>
            </div>
            <div class="body-content-top-center">
              <div class="body-content-lay">
                <h5>GoalKeeper (GK):</h5>
                <h5>0 / 2 minimum</h5>
              </div>
              <div class="body-content-lay">
                <h5>Central Defensive (CB) or Libero (SW):</h5>
                <h5>0 / 4 minimum</h5>
              </div>
              <div class="body-content-lay">
                <h5>Fullbacks (SB):</h5>
                <h5>0 / 4 minimum</h5>
              </div>
              <div class="body-content-lay">
                <h5>Median (DM):</h5>
                <h5>0 / 3 minimum</h5>
              </div>
              <div class="body-content-lay">
                <h5>Midfielder (CM):</h5>
                <h5>0 / 3 minimum</h5>
              </div>
              <div class="body-content-lay">
                <h5>Attacking Midfielder (AM):</h5>
                <h5>0 / 2 minimum</h5>
              </div>
              <div class="body-content-lay">
                <h5>
                  Fuildifying full-back (WB) or Lateral Midfielder (SM) or
                  Foward Wing(WF):
                </h5>
                <h5>0 / 4 minimum</h5>
              </div>
              <div class="body-content-lay">
                <h5>Secondary Striker (SS) or Central Forward (CF):</h5>
                <h5>0 / 4 minimum</h5>
              </div>
              <div class="body-content-lay">
                <h5>Total minimum:</h5>
                <h5>0 / 26 minimum</h5>
              </div>
            </div>
          </div>
          <div class="body-content-bottom">
            <div class="body-lay-table-header">
              <div class="selections">
                <span>Show</span>
                <select name="entries" id="entries">
                  <option value="one">10</option>
                  <option value="one">1</option>
                  <option value="two">2</option>
                  <option value="three">3</option>
                  <option value="four">4</option>
                  <option value="five">5</option>
                  <option value="five">6</option>
                  <option value="five">7</option>
                  <option value="five">8</option>
                  <option value="five">9</option>
                  <option value="five">10</option>
                </select>
                <span>entries</span>
              </div>

              <div class="search-input">
                <label for="search">Search: </label>
                <input type="text" />
              </div>
            </div>
            <div class="bottom-layout">
              <div style="display: block ;" class="bottom-header" id="message">
                <h5>No players in your team</h5>
              </div>

                <?php
                  include '../../../backend/buy_player/buy_player.php';
                ?>

            <div class="table-lay" id="playersDiv" >
              <?php
              include '../../../backend/config/config.php';

              $query = "SELECT * FROM my_players";
              $result = $conn->query($query);

              if ($result->num_rows > 0) {
                echo "<table class='table' id='players'>";
                echo '<div class="table-header">';
                echo "<thead>";
                echo "<th>ID</th>";
                echo "<th>ID_PLAYER</th>";
                echo "<th>NAME_PLAYER</th>";
                echo "<th>CATEGORIES</th>";
                echo "<th>VALUE</th>";
                echo "<th>AUCTION BASIS</th>";
                echo "<th>AUCTION PRICE</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "</thead>";
              echo "</div>";
                
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  

                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['player_id'] . "</td>";
                  echo "<td>" . $row['player_name'] . "</td>";
                  echo "<td>" . $row['categories'] . "</td>";
                  echo "<td>" . $row['value'] . "</td>";
                  echo "<td>" . $row['auction_base'] . "</td>";
                  echo "<td>" . $row['auction_price'] . "</td>";
                  echo "<td><button class='info-btn' id='info-modal'>INFO</button></td>";
                  echo "<td><button class='swap-btn'>SWAP YOUR PLAYER</button></td>";
                  echo "<td><button class='bid-btn'>SELL YOUR PLAYER</button></td>";
                  echo "</tr>";
                }
                
                echo "</table>";
              } else {
                echo "No rows available.";
              }
              ?>
            </div>

          </div>
              <div class="table-footer">
                <h4>Showing 1 to 6 out of 6 entries</h4>
                <div class="pagination-lay">
                  <span>Previous</span>
                  <button class="btn">1</button>
                  <span>Next</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="modal" class="modal">
      <div class="modal-content">
        <span id="closeModalBtn" class="close">&times;</span>
        <div class="modal-body">
          <div class="profile-info">
            <div class="profile">
              <img src="../../../assets/profile pic.jpg" alt="" />
            </div>
            <div class="profile-data">
              <div class="info-container-one">
                <?php
                $playerQuery = "SELECT * FROM roster_da_peterc10 WHERE COL1 = 2";
                $playerResult = $conn->query($playerQuery);

                if ($playerResult->num_rows > 0) {
                  $playerRow = $playerResult->fetch_assoc();
                  ?>
                  <div class="info">
                    <h4>NAME:</h4>
                    <h4><?php echo $playerRow['COL2']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>NATIONALITY:</h4>
                    <h4><?php echo $playerRow['COL22']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>CATEGORY:</h4>
                    <h4><?php echo $playerRow['COL83']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>MARKET VALUE:</h4>
                    <h4><?php echo $playerRow['COL83']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>AUCTION BASIS:</h4>
                    <h4><?php echo $playerRow['COL83']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>HIGHEST BID:</h4>
                    <h4><?php echo $playerRow['COL83']; ?></h4>
                  </div>
                <?php
                } else {
                  echo "No player data available.";
                }
                ?>
              </div>

              <div class="info-container-two">
                <div class="container-header">
                  <h4>ROLES</h4>
                </div>

                <div class="container-body">
                  <?php
                  $rolesQuery = "SELECT * FROM roster_da_peterc10 WHERE COL1 = 2";
                  $rolesResult = $conn->query($rolesQuery);

                  if ($rolesResult->num_rows > 0) {
                    $rolesRow = $rolesResult->fetch_assoc();
                    ?>
                    <div class="container-body-item">
                      <h4>GK: <span><?php echo $rolesRow['COL10']; ?></span></h4>
                      <h4>SW: <span><?php echo $rolesRow['COL11']; ?></span></h4>
                      <h4>CB: <span><?php echo $rolesRow['COL12']; ?></span></h4>
                    </div>
                    <div class="container-body-item">
                      <h4>SB: <span><?php echo $rolesRow['COL13']; ?></span></h4>
                      <h4>DM: <span><?php echo $rolesRow['COL14']; ?></span></h4>
                      <h4>WB: <span><?php echo $rolesRow['COL15']; ?></span></h4>
                    </div>
                    <div class="container-body-item">
                      <h4>CM: <span><?php echo $rolesRow['COL16']; ?></span></h4>
                      <h4>SM: <span><?php echo $rolesRow['COL17']; ?></span></h4>
                      <h4>AM: <span><?php echo $rolesRow['COL18']; ?></span></h4>
                    </div>
                    <div class="container-body-item">
                      <h4>WT: <span><?php echo $rolesRow['COL19']; ?></span></h4>
                      <h4>SS: <span><?php echo $rolesRow['COL20']; ?></span></h4>
                      <h4>CF: <span><?php echo $rolesRow['COL21']; ?></span></h4>
                    </div>
                  <?php
                  } else {
                    echo "No player roles available.";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="details-container">
            <div class="details-header">
              <h2>PLAYER STATS</h2>
            </div>
            <?php
              include '../../../backend/players_info/info.php';
            ?>
          </div>
        </div>
      </div>
    </div>

    <div id="bid-modal" class="modal">
      <div class="modal-content">
        <span id="closeModalBtn" class="close">&times;</span>
        <div class="modal-body">
          <div class="profile-info">
            <div class="profile">
              <img src="../../../assets/profile pic.jpg" alt="" />
            </div>
            <div class="profile-data">
              <div class="info-container-one">
                <?php
                $playerQuery = "SELECT * FROM roster_da_peterc10 WHERE COL1 = 2";
                $playerResult = $conn->query($playerQuery);

                if ($playerResult->num_rows > 0) {
                  $playerRow = $playerResult->fetch_assoc();
                  ?>
                  <div class="info">
                    <h4>NAME:</h4>
                    <h4><?php echo $playerRow['COL2']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>NATIONALITY:</h4>
                    <h4><?php echo $playerRow['COL22']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>CATEGORY:</h4>
                    <h4><?php echo $playerRow['COL83']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>MARKET VALUE:</h4>
                    <h4><?php echo $playerRow['COL83']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>AUCTION BASIS:</h4>
                    <h4><?php echo $playerRow['COL83']; ?></h4>
                  </div>
                  <div class="info">
                    <h4>HIGHEST BID:</h4>
                    <h4><?php echo $playerRow['COL83']; ?></h4>
                  </div>
                <?php
                } else {
                  echo "No player data available.";
                }
                ?>
              </div>

              <div class="info-container-two">
                <div class="container-header">
                  <h4>ROLES</h4>
                </div>

                <div class="container-body">
                  <?php
                  $rolesQuery = "SELECT * FROM roster_da_peterc10 WHERE COL1 = 2";
                  $rolesResult = $conn->query($rolesQuery);

                  if ($rolesResult->num_rows > 0) {
                    $rolesRow = $rolesResult->fetch_assoc();
                    ?>
                    <div class="container-body-item">
                      <h4>GK: <span><?php echo $rolesRow['COL10']; ?></span></h4>
                      <h4>SW: <span><?php echo $rolesRow['COL11']; ?></span></h4>
                      <h4>CB: <span><?php echo $rolesRow['COL12']; ?></span></h4>
                    </div>
                    <div class="container-body-item">
                      <h4>SB: <span><?php echo $rolesRow['COL13']; ?></span></h4>
                      <h4>DM: <span><?php echo $rolesRow['COL14']; ?></span></h4>
                      <h4>WB: <span><?php echo $rolesRow['COL15']; ?></span></h4>
                    </div>
                    <div class="container-body-item">
                      <h4>CM: <span><?php echo $rolesRow['COL16']; ?></span></h4>
                      <h4>SM: <span><?php echo $rolesRow['COL17']; ?></span></h4>
                      <h4>AM: <span><?php echo $rolesRow['COL18']; ?></span></h4>
                    </div>
                    <div class="container-body-item">
                      <h4>WT: <span><?php echo $rolesRow['COL19']; ?></span></h4>
                      <h4>SS: <span><?php echo $rolesRow['COL20']; ?></span></h4>
                      <h4>CF: <span><?php echo $rolesRow['COL21']; ?></span></h4>
                    </div>
                  <?php
                  } else {
                    echo "No player roles available.";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="details-bid-container">
            <div class="details-bid-sub-container">
              <div class="details-container-header">
                <span>May 17, 2023 04:35 PM</span>
              </div>
              <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <div class="details-bid-container-amount">
                <h4>Bid Amount</h4>
                <input type="text" name="amount" />
              </div>
              <div class="details-bid-container-btn">              
                  <button name="bid" class="submit-btn">Submit</button>
                  <button class="cancel-btn">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      const modal = document.getElementById("modal");
      const closeModalBtn = document.getElementsByClassName("close")[0];
      const infoButtons = document.getElementsByClassName("info-btn");

      for (let i = 0; i < infoButtons.length; i++) {
        infoButtons[i].addEventListener("click", function () {
          modal.style.display = "block";
        });
      }

      closeModalBtn.addEventListener("click", function () {
        modal.style.display = "none";
      });

      window.addEventListener("click", function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      });

      const modaltwo = document.getElementById("bid-modal");
      const closeModalBtnTwo = document.getElementsByClassName("close")[0];
      const bidBtns = document.getElementsByClassName("bid-btn");

      for (let i = 0; i < bidBtns.length; i++) {
        bidBtns[i].addEventListener("click", function () {
          modaltwo.style.display = "block";
        });
      }

      closeModalBtnTwo.addEventListener("click", function () {
        modaltwo.style.display = "none";
      });

      window.addEventListener("click", function (event) {
        if (event.target == modaltwo) {
          modaltwo.style.display = "none";
        }
      });
    </script>
    <script>
      const buyLi = document.getElementById('buy');
      const noPlayer = document.getElementById('no-player');

      buyLi.addEventListener('click', function() {
        if (noPlayer.style.display === 'none') {
          noPlayer.style.display = 'block';
        } else {
          noPlayer.style.display = 'none';
        }
      });

    </script>
    <script>
      var playersTable = document.getElementById("players");
      var playersId = document.getElementById("playersId");
      var messageDiv = document.getElementById("message");
      var buyButton = document.getElementById("buy");

      if (playersTable) {
        messageDiv.style.display = "none";
      } else {
        messageDiv.style.display = "block";
      }

      if (buyButton) {
        buyButton.addEventListener("click", function() {
          playersTable.style.display = "none";
          playersDiv.style.display = "none";
        });
      }


    </script>
  </body>
</html>


<?php
if (isset($_POST['bid'])) {
  include '../../../backend/config/config.php';

  $name = $playerRow['COL2'];
  $nationality = $playerRow['COL22'];
  $category = $playerRow['COL83'];
  $marketValue = $playerRow['COL83'];
  $auctionBasis = $playerRow['COL83'];
  $highestBid = $playerRow['COL83'];
  $amount = $_POST['amount'];

  // Construct the SQL INSERT statement
  $insertQuery = "INSERT INTO my_players (player_name, categories, value, auction_base, auction_price) VALUES ('$name', '$category', '$marketValue', '$auctionBasis', '$amount')";

  if ($conn->query($insertQuery) === TRUE) {
    // echo "Data inserted successfully.";
  } else {
    echo "Error: " . $insertQuery . "<br>" . $conn->error;
  }

}
?>
