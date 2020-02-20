<?php 
namespace App\Services;

class QsortService{
    
    
    public function swap(array &$arr,$a,$b){
        $temp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $temp;
    }

    public function partition(array &$arr,$low,$high){
        $pk=$arr[$low];
        $i=$low;
        $j=$high+1;
        do{
            do{
                if ($i==count($arr)-1) {
                    break;
                }else{
                    $i++;
                }
            }while($arr[$i]<$pk);
            do{
                $j--;
            }while($arr[$j]>$pk);
            if($i<$j){$this->swap($arr,$i,$j);}
        }while($i<$j);
        $this->swap($arr,$low,$j);
        return $j;

    }
    public function sort(array &$arr,$head,$tail){
        if($head<$tail){
            $pk_index = $this->partition($arr,$head,$tail);
            $this->sort($arr,$head,$pk_index-1);
            $this->sort($arr,$pk_index+1,$tail);
            return $arr;
        }
    }


}

?>

