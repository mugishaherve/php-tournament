 <div class="details">
    <div class="details-right">
        <?php
        $statsQuery = "SELECT * FROM roster_da_peterc10 WHERE COL1 = 2"; // 
        $statsResult = $conn->query($statsQuery);

        if ($statsResult->num_rows > 0) {
            $statRow = $statsResult->fetch_assoc();
            $statsMapping = array(
                'HEIGHT' => 'COL27',
                'WEIGHT' => 'COL28',
                'STRONG FOOT' => 'COL7',
                'FAVOURED SIDE' => 'COL8',
                'INJURY TOLERANCE' => 'COL5',
                'ATTACK' => 'COL29',
                'DEFENSE' => 'COL30',
                'BALANCE' => 'COL31',
                'STAMINA' => 'COL32',
                'TOP SPEED' => 'COL33',
                'ACCELERATION' => 'COL34',
                'RESPONSE' => 'COL35',
                'AGILITY' => 'COL36',
                'DRIBBLE ACCURACY' => 'COL37',
                'DRIBBLE SPEED' => 'COL38',
                'SHORT PASS ACCURACY' => 'COL39',
                'SHORT PASS SPEED' => 'COL40',
                'LONG PASS ACCURACY' => 'COL41',
                'LONG PASS SPEED' => 'COL42',
                'SHOT ACCURACY' => 'COL43',
                'SHOT POWER' => 'COL44',
                'SHOT TECHNIQUE' => 'COL45',
                'FREE KICK ACCURACY' => 'COL46',
                'SWERVE' => 'COL47',
                'HEADING' => 'COL48',
                'JUMP' => 'COL49',
                'TECHNIQUE' => 'COL50',
                'AGGRESSION' => 'COL51',
                'MENTALITY' => 'COL52',
                'GOALKEEPING' => 'COL53',
                'TEAMWORK' => 'COL54',
                'CONDITION' => 'COL55',
                'CONSISTENCY' => 'COL6',
                'WEAK FOOT ACCURACY' => 'COL56',
                'WEAK FOOT FREQUENCY' => 'COL57',
                'DRIBBLING' => 'COL58',
                'TACTICAL DRIBBLE' => 'COL59',
                'POSITIONING' => 'COL60',
                'REACTION' => 'COL61',
                'PLAYMAKING' => 'COL62',
                'PASSING' => 'COL63',
                'SCORING' => 'COL64',
                '1-1 SCORING' => 'COL65',
                'POST PLAYER' => 'COL66',
                'LINES' => 'COL67',
                'MIDDLE SHOOTING' => 'COL68',
                'SIDE' => 'COL69',
                'CENTER' => 'COL70',
                'PENALTIES' => 'COL71',
                '1-TOUCH PASS' => 'COL72',
                'OUTSIDE' => 'COL73',
                'MARKING' => 'COL74',
                'SLIDING' => 'COL75',
                'COVERING' => 'COL76',
                'D-LINE CONTROL' => 'COL77',
                'PENALTY STOPPER' => 'COL78',
                '1-ON-1 STOPPER' => 'COL79',
                'LONG THROW' => 'COL80'
            );

            foreach ($statsMapping as $heading => $column) {
                echo '<h4 class="details-heading">' . $heading . ': <span>' . $statRow[$column] . '</span></h4>';
            }
        } else {
            echo "No stats available for this player.";
        }
        ?>
    </div>
</div>
