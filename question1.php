<?php
/**
 *  Candidate : Zin Min (zm.mgmg@gmail.com)
 * 
 *  Question 1. Data Store and Load
 *  store and load array
 */

    /** Storing array "a" to string-based format
     * @param array $array_a
     * @return string $str 
    */
    function store(array $array_a)
    {
        $str = '';
        foreach ($array_a as $value) {
         
            foreach ($value as $k => $v) {
                $str .= urlencode($k).'='.urlencode($v).';';
            }
            $str = substr($str, 0, strlen($str) - 1).'\n';
        }
        $str = substr($str, 0, strlen($str) - 2);
        return $str;
    }

    /** Loading text to array
     *  @param str $text
     *  @return array $return_array
     */
    function load($text)
    {
        $main_array = explode('\n', $text);
        $return_array = [];

        foreach ($main_array as $value) {

            $array = explode(';', $value);
            $array_decode = array();

            foreach ($array as $v) {

                $array_key_n_value = explode('=', $v);

                if (!empty($array_key_n_value) && count($array_key_n_value) == 2) {

                    $array_decode[urldecode($array_key_n_value[0])] = urldecode($array_key_n_value[1]);
                }
            }

            if (!empty($array_decode)) {
                $return_array[] = $array_decode;
            }
        }
        return $return_array;

    }

    $a[0]['key1'] = 'value1';
    $a[0]['key2'] = 'value2';
    $a[1]['keyA'] = 'valueA';
    $a[2]['\n'] = 'value;';
    $a[2][';'] = 'value\n';

    echo '<pre>';
    echo '<br><b>origin array "a"</b><br>';
    print_r($a);

    echo '<br><b>store array "a"</b><br>';
    print_r($str = store($a));

    echo '<br><br><b>load array "a"</b><br>';
    print_r(load($str));