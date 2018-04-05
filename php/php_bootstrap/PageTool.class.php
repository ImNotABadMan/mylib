<?php
/**
 * @Author: anchen
 * @Date:   2017-11-15 14:48:28
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-18 20:57:00
 */
/**
 * 结合bootstrap
 */
Class PageTool{

    public function pageHtml($curPage, $pageAll, $url){
        $prePage = $curPage - 1;
        $pprePage = $curPage - 2;
        $nextPage = $curPage + 1;
        $nnextPage = $curPage + 2;

        $str = "";

        if($curPage == 1){
            $str .= "";
        }else if($prePage == 1){
            $str .= "<a href='{$url}?page={$prePage}'>上一页</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>{$prePage}</a> ";
        }else if($pprePage == 1){
            $str .= "<a href='{$url}?page={$prePage}'>上一页</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$pprePage}'>{$pprePage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}??page={$prePage}'>{$prePage}</a> ";
        }else if($pprePage == 2){
            $str .= "<a href='{$url}?page={$prePage}'>上一页</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page=1'>1</a> ";
            $str .= "<a class='btn btn-primary btn-xs's href='{$url}?page={$pprePage}'>{$pprePage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>{$prePage}</a> ";
        }else{
            $str .= "<a href='{$url}?page={$prePage}'>上一页</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page=1'>1</a> ";
            $str .= "<span id='pre'> ...... </span> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$pprePage}'>{$pprePage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>{$prePage}</a> ";
        }

        $str .= "<a class='btn btn-default btn-sm'>$curPage</a> ";

        //右部分
        if($curPage == $pageAll){
            $str .= "";
        }else if($nextPage == $pageAll){
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>{$nextPage}</a> ";
            $str .= "<a href='{$url}?page={$nextPage}'>下一页</a> ";
        }else if($nnextPage == $pageAll){
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>{$nextPage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nnextPage}'>{$nnextPage}</a> ";
            $str .= "<a href='{$url}?page={$nextPage}'>下一页</a> ";
        }else if($nnextPage == $pageAll - 1){
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>$nextPage</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nnextPage}'>{$nnextPage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$pageAll}'>{$pageAll}</a> ";
            $str .= "<a href='{$url}?page={$nextPage}'>下一页</a> ";
        }else{
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>$nextPage</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nnextPage}'>{$nnextPage}</a> ";
            $str .= "<span id='next'> ...... </span> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$pageAll}'>{$pageAll}</a> ";
            $str .= "<a href='{$url}?page={$nextPage}'>下一页</a> ";
        }

        return $str;
    }
}
