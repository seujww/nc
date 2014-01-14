<?php
/**
 * @name Nc_Util_Timer
 * @desc 公共库的工具类
 * @author 
 **/
class Nc_Util_Timer{
    public static $timer = null;

    public function __construct() {
        $this->timer = new Bd_TimerGroup();
    }

    public static function start($key) {
        if (null == self::$timer) {
            self::$timer = new Bd_TimerGroup();
        }

        self::$timer->start($key);
    }

    public static function stop($key) {
        if (null == self::$timer) {
            return false;
        }

        self::$timer->stop($key);
    }

    public static function getTotal($key = null) {
        if (null == self::$timer) {
            return false;
        }

        self::$timer->getTotalTime($key);
    }

    public static function getTimeLog($additionl = false) {
        if (null == self::$timer) {
            return '';
        }

        $timers = self::$timer->getTotalTime();

        if (is_array($additionl)) {
            $timers = array_merge($timers, $additionl);
        }

        $logstr = '';
        foreach($timers as $name => $item) {
            $logstr .= "{$name}_ms={$item} ";
        }

        return trim($logstr);
    }
}
