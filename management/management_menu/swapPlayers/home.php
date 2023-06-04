<?php
include_once '../../../backend/config/config.php';
if (isset($_POST['myInput'])) {
  $selected = $_POST['myInput'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Swap PLayers</title>
  <link rel="stylesheet" href="swapPlayers.css" />
</head>

<body>
  <div class="container">
    <div class="header">
      <div class="user_dash">
        <h1>TOURNMENT MANAGEMENT</h1>
      </div>
      <div class="nav">
        <?php
        include '../../../header/header.php';
        ?>
      </div>
    </div>
    <div class="body-lay">
      <div class="menu">
        <div class="menu-top">
          <div class="menu-top-container">
            <h5>Management Menu</h5>
          </div>

          <?php
          include_once '../../../backend/sidebar/sidebar.php';
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
        <div class="body-container-one">
          <div class="body-header">
            <h4>Bayer Leverkusen FuBball</h4>
            <div>
              <h4>MONEY: <span>$ 50000.00</span></h4>
            </div>

            <div>
              <h4>MEMBERSHIP PLAYERS: <span>0 / 32</span></h4>
            </div>
          </div>
          <div class="body-main">
            <div class="body-main-left">
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
            <div class="body-main-right">
              <h4 class="heading">Choose team to search</h4>
              <div class="body-main-right-content">

                <?php
                if (!empty($selected)) {
                  $query = "SELECT * FROM roster_da_peterc10 WHERE COL25 = '$selected'";
                  $result = mysqli_query($conn, $query);
                  $query = "SELECT * FROM roster_da_peterc10 WHERE COL25 = '$selected'";
                  $result = mysqli_query($conn, $query);

                  if ($result) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row) {
                      $selectedId = $row['COL1'];
                    } else {
                    }
                  } else {
                    echo "Query failed";
                  }
                } else {
                  echo '';
                }
                ?>



                <h4 class="heading"><?php echo !empty($selected) ? $selected : 'Please select team'; ?> - <?php echo !empty($selectedId) ? $selectedId : ''; ?></h4>
                <div class="body-main-right-content-items">
                  <input type="text" id="filterInput" />
                  <div class="body-main-right-content-items-container">
                    <?php
                    include_once '../../../backend/config/config.php';

                    $query = "SELECT COL25 FROM roster_da_peterc10";
                    $result = mysqli_query($conn, $query);

                    $data = array();

                    if ($result && mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row['COL25'];
                      }
                    } else {
                      echo "No data found.";
                    }

                    ?>
                    <ul id="names">
                      <?php foreach ($data as $value) { ?>
                        <li class="collection-item" name="name" onclick="sendValue('<?php echo $value; ?>')">
                          <a href="#" style="color: black; text-decoration: none;"><?php echo $value; ?></a>
                        </li>
                      <?php } ?>


                      <?php
                      include_once '../../backend/config/config.php';

                      if (isset($_POST['save'])) {

                        $query = "SELECT COL25 FROM roster_da_peterc10";
                        $query_result = mysqli_query($conn, $query);
                        if ($query_result && mysqli_num_rows($query_result) > 0) {
                          while ($row = mysqli_fetch_assoc($query_result)) {
                            $data[] = $row['COL25'];
                          }
                        } else {
                          echo "No data found.";
                        }
                        foreach ($data as $value) {
                          $names = $value;
                        }
                        $sql = "INSERT INTO teams (name) VALUES ('$names')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                        } else {
                          echo "Error inserting data: " . mysqli_error($conn);
                        }
                      }
                      ?>


                      <form id="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" id="myInput" name="myInput">
                      </form>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="sub-container">
          <div class="body-container-two">
            <div class="body-container-two-heading">
              <h4>CHOOSE YOUR PLAYERS TO TRADE</h4>
            </div>
            <div class="body-container-two-body">
              <div class="table">
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
                    <label class="one" for="search">Search: </label>
                    <input type="text" />
                  </div>
                </div>

                <div class="body-lay-table-content">
                  <table>
                    <thead>
                      <th>ID</th>
                      <th>ID_PLAYER</th>
                      <th>NAME_PLAYER</th>
                      <th>CATEGORIES</th>
                      <th>ID_USER</th>
                      <th>NAME_USER</th>
                      <th>TEAM_NAME_USER</th>
                      <th>VALUE</th>
                      <th></th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      include '../../../backend/config/config.php';
                      $query = "SELECT * FROM my_players";
                      $result = $conn->query($query);
                      if ($result === false) {
                        die("Error: " . $conn->error);
                      }
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $row['id'] . "</td>";
                          echo "<td>" . $row['player_id'] . "</td>";
                          echo "<td>" . $row['player_name'] . "</td>";
                          echo "<td>" . $row['categories'] . "</td>";
                          echo "<td>" . $row['id'] . "</td>";
                          echo "<td>" . $row['player_name'] . "</td>";
                          echo "<td>" . $row['player_name'] . "</td>";
                          echo "<td>" . $row['value'] . "</td>";
                          echo "<td><button class='info-btn'>INFO</button></td>";
                          echo "<td><input type='checkbox' class='select' name='sell' id='checked' /></td>";
                          echo "</tr>";
                        }
                      } else {
                        echo "<tr><td colspan='10'>No data found.</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                  <div class="table-footer">
                    <h4 id="selectedInfo" style="display: none;">
                      SELECTED <span id="selectedCount"></span> PLAYERS FOR A TOTAL VALUE OF
                      <span>3750.00</span>
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="body-container-two">
            <div class="body-container-two-heading">
              <h4>CHOOSE USER_ID 6 PLAYERS TO TRADE WITH</h4>
            </div>
            <div class="body-container-two-body">
              <div class="table">
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
                    <label class="one" for="search">Search: </label>
                    <input type="text" />
                  </div>
                </div>

                <div class="body-lay-table-content">
                  <table>
                    <thead>
                      <th>ID</th>
                      <th>ID_PLAYER</th>
                      <th>NAME_PLAYER</th>
                      <th>CATEGORIES</th>
                      <th>ID_USER</th>
                      <th>NAME_USER</th>
                      <th>TEAM_NAME_USER</th>
                      <th>VALUE</th>
                      <th></th>
                      <th></th>
                    </thead>

                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>
                          <button class="info-btn">INFO</button>
                        </td>
                        <td>
                          <input type="checkbox" name="sell" id="sellCheck" />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="table-footer">
                    <h4>
                      SELECTED N.<span>3</span> PLAYERS FOR A TOTAL VALUE OF
                      <span>3750.00</span>
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="body-container-three">
            <h4 class="swap-btn">CONTINUE TO THE EXCHANGE PROPOSAL</h4>
          </div>
          <div id="swap-modal" class="modal">
            <div class="modal-content">
              <span id="closeModalBtn" class="close">&times;</span>
              <div class="modal-body">
                <div class="modal-body-one">
                  <h4>YOU ARE TRADING YOUR PLAYERS</h4>

                  <div>
                    <div class="modal-body-one-list">
                      <h5>Diego Maradona</h5>
                      <h5>Diego Maradona</h5>
                      <h5>Diego Maradona</h5>
                    </div>
                    <div class="modal-body-one-value">
                      <h4>FOR A TOTAL VALUE OF $ 23458</h4>
                    </div>
                  </div>
                </div>
                <div class="modal-body-two">
                  <h4>WITH USER_ID 6 PLAYERS NAME KENNY</h4>

                  <div>
                    <div class="modal-body-one-list">
                      <h5>Michelle Platini</h5>
                      <h5>Michelle Platini</h5>
                    </div>
                    <div class="modal-body-one-value">
                      <h4>FOR A TOTAL VALUE OF $ 23458</h4>
                    </div>
                  </div>
                </div>
                <div class="modal-body-three">
                  <h4>PLUS ONE MONEY PART OF</h4>
                  <div class="modal-body-three-content">
                    <input type="text" />
                    <div class="transfer-details-btns">
                      <button class="submit-btn">Submit</button>
                      <button class="cancel-btn">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="table-footer">
            <h4 id="selectedInfo" style="display: none;">
              SELECTED N.<span id="selectedCount">0</span> PLAYERS FOR A TOTAL VALUE OF
              <span>3750.00</span>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    const filterInput = document.querySelector('#filterInput');
    filterInput.addEventListener('keyup', filterNames);

    function filterNames() {
      const filterValue = document.querySelector('#filterInput').value.toUpperCase();
      const ul = document.querySelector('#names');
      const li = ul.querySelectorAll('li.collection-item');
      for (let i = 0; i < li.length; i++) {
        const a = li[i].getElementsByTagName('a')[0];
        if (a.innerHTML.toUpperCase().indexOf(filterValue) > -1) {
          li[i].style.display = '';
        } else {
          li[i].style.display = 'none';
        }
      }
    }
  </script>
  <script>
    function sendValue(value) {
      document.getElementById('myInput').value = value;
      document.getElementById('myForm').submit();
    }
  </script>
  <script>
    const selected = document.querySelector('#checked');
    const selectedCount = document.querySelector('#selectedCount');
    const selectedInfo = document.querySelector('#selectedInfo');

    let selectedEntities = [];
    selected.addEventListener("change", function(event) {
      if (event.target.checked) {

        let checkedValue = event.target.value;
        selectedEntities.push(checkedValue);


        selectedInfo.style.display = 'block';
        selectedCount.textContent = selectedEntities.length;
      } else {
        console.log("Checkbox is unchecked");
      }
    });
  </script>
  <script>
    const modal = document.getElementById("swap-modal");
    const closeModalBtn = document.getElementsByClassName("close")[0];
    const swapBtn = document.getElementsByClassName("swap-btn");

    for (let i = 0; i < swapBtn.length; i++) {
      swapBtn[i].addEventListener("click", function() {
        modal.style.display = "block";
      });
    }

    closeModalBtn.addEventListener("click", function() {
      modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    });

    const handleShow = () => {
      const item = document.getElementById("list");
      const header = document.getElementById("header");
      const nav = document.getElementById("nav");

      if (header.style.display !== "none") {
        header.style.display = "none";
        item.style.display = "flex";
        nav.style.display = "flex";
        nav.style.gap = "20px";
        nav.style.justifyContent = "space-between";
        nav.style.alignItems = "center";
        item.style.gap = "5px";
      } else {
        header.style.display = "block";
        nav.style.alignItems = "center";
        item.style.display = "none";
      }
    };
  </script>
</body>

</html>