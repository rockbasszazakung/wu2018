<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        $m = ["ผม","คราบ","ครับ","ตุ้ด"];
        $y = ["ค่ะ","หนู","ว้าย","ทอม"];

        for($i = 0 ; $i <sizeof($m); $i++){
            if (stripos($text,$m[$i]) !== false){
                return 'Male';
            }
        }

        for($i = 0 ; $i <sizeof($y); $i++){
            if (stripos($text,$y[$i]) !== false){
                return 'Female';
            }
        }
        return 'Unknown';
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {
        $happy = ["จุ้บ","ม้วฟ"];
        $normal = ["คุณ","ท่าน"];
        $nothappy = ["สัส","ค.ย"];

        for($i = 0 ; $i <sizeof($happy); $i++){
            if (stripos($text,$happy[$i]) !== false){
                return 'Positive';
            }
        }

        for($i = 0 ; $i <sizeof($normal); $i++){
            if (stripos($text,$normal[$i]) !== false){
                return 'Neutral';
            }
        }
        for($i = 0 ; $i <sizeof($nothappy); $i++){
            if (stripos($text,$nothappy[$i]) !== false){
                return 'Negative';
            }
        }
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
        $not = ["สัส","เลว","หมา","มึง","อีจืด","อีอ้วน","อีดอก","อีนมเล็ก"];
        $arry = [];
        for($i = 0 ; $i <sizeof($not); $i++){
            if (stripos($text,$not[$i]) !== false){
                array_push($arry,$not[$i]);
            }
        }
        return $arry;
    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        $language = [];
        if(preg_replace('/[^ก-๙]/ u','',$text)!=""){
            array_push($language,"TH");
        } 
        if(preg_replace('/[^a-z]/ u','',$text)!=""){
            array_push($language,"EN");
        }
        return $language;
    }
}
