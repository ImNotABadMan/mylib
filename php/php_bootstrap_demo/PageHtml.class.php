<?php
/**
 * @Author: anchen
 * @Date:   2017-11-20 20:45:06
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-20 22:11:54
 */

class PageHtml{
    public static function pageOutput($curPage, $pageCount, $url){
        $prePage = $curPage - 1;
        $pprePage = $curPage - 2;
        $nextPage = $curPage + 1;
        $nnextPage = $curPage + 2;

        $str = "";
        if($curPage == 1){
            $str .= "";
        }else if($prePage == 1){
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>上一页</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>{$prePage}</a> ";
        }else if($pprePage == 1){
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>上一页</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$pprePage}'>{$pprePage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>{$prePage}</a> ";
        }else if($pprePage -1 == 1){
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>上一页</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page=1'>1</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$pprePage}'>{$pprePage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>{$prePage}</a> ";
        }else{
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>上一页</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page=1'>1</a> ";
            $str .= "<span id='pre'>......</span> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$pprePage}'>{$pprePage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$prePage}'>{$prePage}</a> ";
        }

        $str .= "<a class='btn btn-default btn-sm'>{$curPage}</a> ";

        if($curPage == $pageCount){
            $str .= "";
        }else if($nextPage == $pageCount){
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>{$nextPage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>下一页</a> ";
        }else if($nnextPage == $pageCount){
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>{$nextPage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nnextPage}'>{$nnextPage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>下一页</a> ";
        }else if($nnextPage + 1 == $pageCount){
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>{$nextPage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nnextPage}'>{$nnextPage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$pageCount}'>{$pageCount}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>下一页</a> ";
        }else{
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>{$nextPage}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nnextPage}'>{$nnextPage}</a> ";
            $str .= "<span id='next'>......</span> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$pageCount}'>{$pageCount}</a> ";
            $str .= "<a class='btn btn-primary btn-xs' href='{$url}?page={$nextPage}'>下一页</a> ";
        }
        return $str;
    }
}

