<h1>
    Singleton
</h1>
<?php
abstract class lesson{
    protected $duration;
    const FIXED =1;
    const TIMED =2;
    private $costtype;
    public function __construct ($duration, $costtype = self::FIXED){
        $this->duration = $duration;
        $this->costtype = $costtype;

    }
    public function cost(){
            switch ($this->costtype){
                CASE self::TIMED :
                    return (5 *$this->duration);
                    break;
                CASE self::FIXED:
                    return 30;
                    break;
                default:
                    $this->costtype = self::FIXED;
                    return 30;
            }
    }

    public function chargeType(){
        switch ($this->costtype){
            CASE self::TIMED:
                return "Погодинна оплата";
                break;
            break;
            CASE self::FIXED:
                return "Фіксована оплата";
                break;
            default:
                $this->costtype = self::FIXED;
                return "Фіксована оплата";

        }
    }
}

class Lecture extends Lesson{

}

class Seminar extends Lesson{

}
$lecture = new Lecture(5,Lesson::FIXED);
$seminar = new Seminar(3,Lesson::TIMED);
print "{$lecture->cost()} ({$lecture->chargeType()})/<br/>";
print "{$seminar->cost()} ({$seminar->chargeType()})/<br/>";
?>
