<?php
/**
 * @Author: anchen
 * @Date:   2018-01-02 16:19:25
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-03 08:40:47
 */
header("content-type:text/html;charset=utf-8");
if($_POST){
    $config = array(
        'source' => "D:/PHP/PHP_Soft/thinkphp_3.2.3_full",
        'dirs' => array('Think', 'Public'),
        'files' => array('.htaccess', 'README.md', 'composer.json')
    );

    $target = $_POST['target'];
    $target = str_replace('\\', '/', $target);

    //移动文件
    function mvFile($dir, $target){
        $dir = str_replace("\\", '/', $dir);
        $target = str_replace("\\", '/', $target);
        $re = opendir($dir);
        //循环目录
        while( $dirname = readdir($re) ){
            if( $dirname != '.' && $dirname != '..'){
                //源的全路径
                $innerDir = $dir . "/" . $dirname;
                //目标目录          取得他后面的相对路径
                $targetDir = $target . str_replace($GLOBALS["config"]['source'], "", $innerDir);
                if( is_dir($innerDir) ){
                    // echo $targetDir . "<br />";
                    // 目标没有此路径则创建
                    if( !is_dir($targetDir) ){
                        mkdir($targetDir);
                    }
                    //递归
                    mvFile($innerDir, $target);
                    // echo $innerDir . "<br />";
                }else{
                    // echo $targetDir . "<br />";
                    $flag = true;
                    //是否不想移动的文件
                    foreach($GLOBALS['config']['files'] as $file){
                        if($file == $dirname){
                            $flag = false;
                            echo $innerDir . "<br />";
                            break;
                        }
                    }
                    //$flag为true后面才执行
                    $flag && copy($innerDir, $targetDir);
                }
            }

        }
    }
    // var_dump($_POST);die;

    // echo $target;die;
    if( !is_dir($target) ){
        mkdir( $target );
    }

    mvFile($config['source'], $target);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="tp_move.php" method='post'>
        <input type="text" name="target" />
        <input type="submit"  />
    </form>

</body>
</html>
