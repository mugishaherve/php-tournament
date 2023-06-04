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