<?php 
namespace App\Services;

class QsortService{
    
    
    public function swap(array &$arr,$a,$b){
        $temp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $temp;
    }

    public function sort(array &$arr,$low,$high){
        if($low<$high){
            $pk=$arr[$low];
            $i=$low;
            $j=$high+1;
            do{
                do{
                    $i++;
                }while($arr[$i]<$pk);
                do{
                    $j--;
                }while($arr[$j]>$pk);
                if($i<$j){$this->swap($arr,$i,$j);}
            }while($i<$j);
            $this->swap($arr,$low,$j);
            $this->sort($arr,$low,$j-1);
            $this->sort($arr,$j+1,$high);
            return $arr;
        }
    }


}

?>

