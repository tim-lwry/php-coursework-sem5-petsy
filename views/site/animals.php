<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */
use app\models\AnimalRace;


?>
    <div id="cb" style="margin-left: 0%">
            <?php 
                foreach($rows as $row) {
                    if($row['taken']==1) 
                        continue;
                    echo "<div style='margin: 5%; border-bottom: 1px grey solid;'>";
                    echo "<div><b>Имя: " . $row['name'] . "</div>";
                    echo "<div>Пол: " . $row['gender'] . "</div>";
                    echo "<div>Тип: ".AnimalRace::findOne($row['animal_race_fk'])->race."</div>";
                    echo "<a href='../site/animal-view?id=".$row["id"]."'>Ссылка</a>";
                    echo "</b></div>";
                }
            ?>
    </div>
</body>