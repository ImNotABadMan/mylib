<?php
/**
 * @Author: anchen
 * @Date:   2017-11-08 08:08:25
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-08 10:02:53
 */
/**
 * 返回分页HTML部分
 * @param $currentPage 当前页
 * @param  $totalPage 总页数
 * @return string 分页的html界面
 */
function pagerHtml($currentPage, $totalPage, $url){

    $prePage = $currentPage - 1;//上一页
    $pprePage = $currentPage - 2;//上上一页
    $nextPage = $currentPage + 1;//下一页
    $nnextPage = $currentPage + 2;//下下一页
    $str = "";//用于构建html页面
    if($currentPage == 1){
        $str .= " ";
    }else if($prePage == 1){
        $str .= "<a href='$url?page={$prePage}'>上一页</a> ";
        $str .= "<a href='$url?page={$prePage}'>{$prePage}</a> ";
    }else if($pprePage == 1){
        $str .= "<a href='$url?page={$prePage}'>上一页</a> ";
        $str .= "<a href='$url?page={$pprePage}'>{$pprePage}</a> ";
        $str .= "<a href='$url?page={$prePage}'>{$prePage}</a> ";

    }else{
        $str .= "<a href='$url?page={$prePage}'>上一页</a> ";
        $str .= "<a href='$url?page=1'>1</a>";
        $str .= "...";
        $str .= "<a href='$url?page={$pprePage}'>{$pprePage}</a> ";
        $str .= "<a href='$url?page={$prePage}'>{$prePage}</a> ";
    }

    $str .= "<a>{$currentPage}</a> ";//当前页，中间

    if($currentPage == $totalPage){
        $str .= " ";
    }else if($nextPage == $totalPage){
        $str .= "<a href='$url?page={$nextPage}'>{$nextPage}</a> ";
        $str .= "<a href='$url?page={$nextPage}'>下一页</a> ";
    }else if($nnextPage == $totalPage){
        $str .= "<a href='$url?page={$nextPage}'>{$nextPage}</a> ";
        $str .= "<a href='$url?page={$nnextPage}'>{$nnextPage}</a> ";
        $str .= "<a href='$url?page={$nextPage}'>下一页</a> ";
    }else{
        $str .= "<a href='$url?page={$nextPage}'>{$nextPage}</a> ";
        $str .= "<a href='$url?page={$nnextPage}'>{$nnextPage}</a> ";
        $str .= "...";
        $str .= "<a href='$url?page={$totalPage}'>{$totalPage}</a> ";
        $str .= "<a href='$url?page={$nextPage}'>下一页</a> ";
    }

    return $str;
}