<?php

//エスケープ処理をする関数
//$strエスケープしたい文字
//returnエスケープした文字
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');   
}









//phpのコードだけなら終了タグ不要
