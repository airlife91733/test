<?php
// instance
$num = new Num;

$num->array_in = array(
                    array(1, 4, 6, 10),
                    array(6, 8, 6, 14),
                    array(6, 8 ,9, 9),
                    array(13, 11, 18, 13),
                    array(16, 16, 11, 17),
                    array(18, 16, 16, 12)
                    );
$k = $num->main();

$array = $num->array_in;

$n = $num->compare($array);

var_dump($n);


/**
* class num
*/
class Num {

    public $array_in = array(); 
    
    function __construct() {
        // test
    }
    
    function main() {
        
        // $array_in = ; // array來源
        
        // $array_compare = ; // array 轉換
        
        // $array_default
        
        //$a = $this->arr_default();
        //$b = $this->print_array($a);
        
        //$c = $this->compare($this->array_in);
        
        //return $c;
    }
    
    function arr_default() {            // 產生補零陣列
        $array = array();
        for($i=0; $i<=5; $i++) {
            $array[][] = 0;
            for($j=0; $j<=3; $j++) {
                $array[$i][$j] = 0;
            }
        }
        return $array;
    }
    
    function turn($array) {
        // a[y][x] => a[$y][$x] 6 * 4 矩陣
        // $y = count($array) - 1;         // 5
        // $x = count($array[0]) - 1;      // 3
        
        // a[y-1][x-1] a[y-1][x]
        // a[y][x-1] a[y][x]
        
        // $last_num = $array[$y][$x];     // 陣列中最後一筆資料
        
        return $array;
    }
    
    function compare($array) {
        
        // 4取1 / 2取1
        while($i<=7) {
            
        }
        
        
        $array_xy = $array;
        
        /* 1. 輸入陣列抓取最後一筆資料之座標
        *  a[y-1][x-1] a[y-1][x]
        *  a[y][x-1] a[y][x]
        */
        $y = count($array) - 1;         // 5
        $x = count($array[0]) - 1;      // 3
        
        /* 2. 利用最後一筆資料之座標抓其周圍3筆資料之座標
        *     抓側座標[y'][x'] 並比較找出最小值
        *  a[y-1][x-1], a[y-1][x]       // 1, 2
        *  a[y][x-1],   a[y][x]         // 3, 4
        */
        $a1 = $array[$y-1][$x-1];       // (4, 2)
        $a2 = $array[$y-1][$x];         // (4, 3)
        $a3 = $array[$y][$x-1];         // (5, 2)
        $a4 = $array[$y][$x];           // (5, 3)last_num 陣列中最後一筆資料
        
        if($y-1>=0 && $x-1>=0) {        // 第一種情況: center(不會到邊界) 1, 2, 3, 4
            $array_c = array($a1, $a2, $a3, $a4);
        } else if($y-1<0 && $x-1>=0) {  // 第二種情況: 上邊界 3, 4
            $array_c = array($a3, $a4);
        } else if($y-1>=0 && $x-1<0 ) { // 第三種情況: 左邊界 1, 2
            $array_c = array($a1, $a2);
        } else {                        // 最後種情況: 頂端
            $array_c = array($a4);
        }
        $array_min = min($array_c);
        
        echo $array_min;
        
        $t = $this->array_keys_re($array, $array_min);
        
        foreach($t as $r => $b) {
            echo '['.$r.','.$b.']';
        }
        
        return $t;
    }
    
    
    /* 二維陣列用's array_keys */
    function array_keys_re($array, $value, $strict=null) {
        $t = array();
        foreach($array as $i => $v) {
            //$a = array_keys($valau[$i], 11); 
            $check = array_keys($v, $value);
            if(!empty($check)) {
                $t+= array($i => $check[0]);
            }
        }
        
        return $t;
    }
    
    private function print_array($array) {
        
        $y = count($array) - 1;         // 5
        $x = count($array[0]) - 1;      // 3
        
        $a = '<table>';
        foreach($array as $row) {
            $a.= '<tr>';
            foreach($row as $piece) {
                $a.= '<td>'.$piece.'</td>';
            }
            $a.= '</tr>';
        }
        $a.= '</table>';
                
        return $a;
    }
    
    function __destruct() {
        //test
    }
}

?>
