<?php

namespace app\widgets;

use kartik\grid\GridView as BaseGridView;

class GridView extends BaseGridView
{
    public $layout = '<div class="box-body no-padding table-responsive">{items}</div>
                      <div class="box-footer no-print clearfix">
                          <div class="pull-left">{summary}</div>
                          <div class="pull-right">{pager}</div>
                       </div>';

    public $pager = [
        'options' => [
            'class' => 'pagination pagination-sm no-margin pull-right',
        ],
    ];

    public $responsiveWrap = false;
}