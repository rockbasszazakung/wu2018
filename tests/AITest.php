<?php

use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function testGender_Male(): void
    {
        $result = AI::getGender('สวัสดีครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Male1 (): void
    {
        $result = AI::getGender('สวัสดีคราบ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Male2 (): void
    {
        $result = AI::getGender('อีตุ้ดเอ่ย');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);

    }

    public function testGender_Female(): void
    {
        $result = AI::getGender('สวัสดีค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Female1 (): void
    {
        $result = AI::getGender('หนูหิวกล้วยค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Female2 (): void
    {
        $result = AI::getGender('ว้ายผัวหนูหายค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function testgetSentiment_Positive(): void
    {
        $result = AI::getSentiment('อยากจะจุ้บเธอซักที');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result, $result);
    }
    
    public function testgetSentiment_Positive1(): void
    {
        $result = AI::getSentiment('เรามาม้วฟกันเถอะ');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result, $result);
    }

    public function testgetSentiment_Neutral(): void
    {
        $result = AI::getSentiment('อีคุณเธอใจร้าย');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result, $result);
    }

    public function testgetSentiment_Neutral1(): void
    {
        $result = AI::getSentiment('ท่านดอกทอง');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result, $result);
    }
    
    public function testgetSentiment_Negative(): void
    {
        $result = AI::getSentiment('สัสเอ่ย');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }

    public function testgetSentiment_Negative1(): void
    {
        $result = AI::getSentiment('ค.ย นะจ้ะเรา');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }
    public function testgetRudeWords1(): void
    {
        $result = AI::getRudeWords('สัสเเม่ง');
        $expected_result = ['สัส'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
    public function testgetRudeWords2(): void
    {
        $result = AI::getRudeWords('เลวม้วก');
        $expected_result = ['เลว'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
    public function testgetRudeWords3(): void
    {
        $result = AI::getRudeWords('ไอหมา');
        $expected_result = ['หมา'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
    public function testgetRudeWords4(): void
    {
        $result = AI::getRudeWords('มึงกูเพื่อนกันตลอดไป');
        $expected_result =['มึง'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
    public function testgetRudeWords5(): void
    {
        $result = AI::getRudeWords('อีจืดเอ๋ย');
        $expected_result = ['อีจืด'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
    public function testgetRudeWords6(): void
    {
        $result = AI::getRudeWords('อีอ้วนเอ๋ย');
        $expected_result = ['อีอ้วน'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
    public function testgetRudeWords7(): void
    {
        $result = AI::getRudeWords('อีดอกทอง');
        $expected_result = ['อีดอก'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
    public function testgetRudeWords8(): void
    {
        $result = AI::getRudeWords('อีอ้วนเอ๋ย');
        $expected_result = ['อีอ้วน'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }

    public function testgetLanguages_thai(): void
    {
        $result = AI::getLanguages('ไทย');
        $expected_result = ['TH'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
    public function testgetLanguages_eng(): void
    {
        $result = AI::getLanguages('eng');
        $expected_result = ['EN'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
    public function testgetLanguages_thaieng(): void
    {
        $result = AI::getLanguages('ไทย eng');
        $expected_result = ['TH','EN'];
        $this->assertTrue(count(arry_diff_key($result,$expected_result)) === 0);
    }
}