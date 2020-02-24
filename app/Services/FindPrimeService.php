<?php 
namespace App\Services;
class FindPrimeService{
        public function is_prime($num){
                $odd=3;
                while($odd<$num && $odd<999){
                        if($num%$odd==0){
                                return 0;
                        }
                        $odd+=2;
                }
                return 1;
        }

        public function find_nth($n){
                $a=[2];
                $len=1;
                $num=3;
                while($len<$n && $num<999){
                        if($this->is_prime($num)){
                                array_push($a,$num);
                                $len++;
                        };
                        $num+=2;
                }
                return end($a);
        }
}
?>