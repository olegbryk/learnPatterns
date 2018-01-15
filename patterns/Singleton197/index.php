<h1>
    Singleton
</h1>
<?php
abstract class Lesson{
    private $duration;
    private $costStrategy;
    const FIXED =1;
    const TIMED =2;
    public function __construct ($duration, CostStrategy $strategy){
        $this->duration = $duration;
        $this->costStrategy = $strategy;

    }
    public function cost(){
        return $this->costStrategy->cost($this);
    }

    public function chargeType(){
        return $this->costStrategy->chargeType();
    }
    public function  getDuration(){
        return $this->duration;
    }

}

class Lecture extends Lesson{

}

class Seminar extends Lesson{

}

abstract class CostStrategy{
    abstract function cost(Lesson $lesson);
    abstract function chargeType();
}

class FixedCostStrategy extends CostStrategy{
    function cost(Lesson $lesson)
    {
        return 30;
    }
    function chargeType()
    {
       return "Фіксована ставка";
    }
}

class TimeCostStrategy extends CostStrategy{
    function chargeType()
    {
       return "Погодинна оплата";
    }
    function cost(Lesson $lesson)
    {
        return $lesson->getDuration()*5;
    }
}

$lessons[] = new Seminar(4,new TimeCostStrategy());
$lessons[] = new Lecture(3,new FixedCostStrategy());
foreach ($lessons as $lesson){
    print "Оплата за урок: {$lesson->cost()}.";
    print "Тип оплати: {$lesson->chargeType()}.<br>";
}
?>
