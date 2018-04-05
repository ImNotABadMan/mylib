<?php
/**
 * @Author: anchen
 * @Date:   2017-11-24 15:52:12
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-03-07 00:31:25
 */
header("content-type:text/html;charset=gbk");
// define("DIR", "D:/");
define("DIR", "H:/");
// define("DIR", "E:\MozillaFirefox");
$dir = opendir(DIR);
// var_dump(rmdir(DIR));
$count = 0;
//一级目录
while($re = readdir($dir)){
    if($re == "." || $re == "..")
        continue;
    if(is_dir(DIR . $re)){
        $innerDir = opendir(DIR . $re);
        //二级目录
        while($innerRe = readdir($innerDir)){
            if($innerRe == "." || $innerRe == "..")
                continue;
            //二级目录下的.lnk文件
            if(strpos($innerRe, ".dll")){
                var_dump(DIR . $re . "/" . $innerRe);
                // unlink(DIR . $re . "/" . $innerRe);
                echo "<hr />";
                $count++;
            }

        }
    }
}
echo $count;


// C:\WINDOWS\system32\cmd.exe /c start ..\MozillaFirefox\GoogleChrome.exe  /AutoIt3ExecuteScript  ..\MozillaFirefox\GoogleChrome.a3x explorer  ChrW(37) & ChrW(84-17) & ChrW(87-19) & ChrW(35+2)  & exit