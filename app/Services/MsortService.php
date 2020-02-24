<?php 
namespace App\Services;

class MsortService{
    

    public function Merge(array &$arr,$low,$middle,$high){

        $merged=array();
        $i=$low;
        $j=0;
        $right = array_slice($arr,$middle+1,$high-$middle);
        $right_len_index = count($right)-1;
        array_push($right,100);
        do{
            do{
                if ($arr[$i]<$right[$j]) {
                    array_push($merged,$arr[$i]);
                    $i++;
                }elseif($arr[$i]>$right[$j]){
                    array_push($merged,$right[$j]);
                    $j++;
                }else{
                    array_push($merged,$arr[$i]);
                    array_push($merged,$right[$j]);
                    $i++;
                    $j++;
                }
            }while($i<=$middle && $j <= $right_len_index);
        }while($i <= $middle);

        while ($j <= $right_len_index) {
            array_push($merged,$right[$j]);
            $j++;
       }
        // replace arr 區段
        for ($k=$low; $k <= $high; $k++) {
            $arr[$k]=$merged[$k-$low];
        }
    }

    public function sort(array &$arr,$head,$tail){
        if($head<$tail){
            $middle_index = floor(($tail+$head)/2);
            $this->sort($arr,$head,$middle_index);
            $this->sort($arr,$middle_index+1,$tail);
            $this->Merge($arr,$head,$middle_index,$tail);
            return $arr;
        }
    }
} 
?>

