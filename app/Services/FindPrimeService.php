<?php 
namespace App\Services;
class FindPrimeService{
        public function is_prime($num){
                $i=2;
                $odd=3;
                while($odd<$num && $i<9999){
                        if($num%$odd==0){
                                return 0;
                        }
                        $i++;
                        $odd=$i*2+1;
                }
                return 1;
        }

        public function find_nth($n){
                $a=[2];
                $len=1;
                $number=1;
                while($len<$n && $number<999){
                        $num=$number*2+1;
                        if($this->is_prime($num)){
                                array_push($a,$num);
                                $len++;
                        };
                        $number++;
                }
                return end($a);
        }
}
?>