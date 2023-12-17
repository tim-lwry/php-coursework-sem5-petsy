<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */
use app\models\AnimalRace;


?>
    <div id="cb" style="">
            <?php 
                
                    echo "<div style='margin: 5%'>";
                    echo "<div><b>Имя: " . $animal['name'] . "</div>";
                    echo "<div>Пол: " . $animal['gender'] . "</div>";
                    echo "<div>Тип: ".AnimalRace::findOne($animal['animal_race_fk'])->race."</div>";
                    echo "<div>Можно взять: ".($animal['taken']==0?'Да':'Нет')."</div>";
                    echo "<div>Подробная информация: ".$animal['info']."</div>";

                    echo "<a href='../site/animal'>Список</a>";
                    echo "</b></div>";
            ?>
    </div>
</body>