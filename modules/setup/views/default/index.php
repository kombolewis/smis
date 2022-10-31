<?php

use app\assets\JstreeAsset;
use yii\helpers\Html;

JstreeAsset::register($this);
?>
    <div class="container studentRecords-default-index">

        <header class="pb-1 mb-4 border-bottom fs-4 d-flex flex-col text-primary">
            <?= Html::a(
                '<span><i class="bi bi-house fs-4"></i>  Home</span>', ['/'],
                ['class' => "d-flex align-items-center text-decoration-none text-primary mx-3 flex-grow"])
            ?>	>		
			<?= Html::a(
                '<span><i class="bi bi-wrench-adjustable fs-4"></i> Setup </span>', ['/setup'],
                ['class' => "d-flex align-items-center text-decoration-none text-primary mx-3 flex-grow"])
            ?>
            <div class="row justify-content-center align-items-center fs-6 flex-fill pt-2">
                <div class="col d-flex flex-row ">
                    <i class="bi bi-search fs-6 pr-2"></i>
                    <label class="w-100">
                        <input id="menu-search-input" type="text"
                               class="px-2 border-0 border-bottom w-100 f-5 bg-transparent" placeholder="Menu Search"
                               style="outline: none;"/>
                    </label>
                    <span id="menu-clear" class="fw-bold text-danger" style="cursor: pointer"><i class="bi bi-x-octagon-fill"></i></span>
                </div>
            </div>
        </header>
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-2 menu-container">
            <div class="col menu-tree-container"></div>
        </div>
    </div>
<?php
$jsonMenu = "
[
    {'text' : 'General','a_attr':{'href':'javascript:void()'},
    'children' : [
        { 'text' : 'Country','a_attr' : {'href':'setup/country'},'type':'links' },
    ]},
    {'text' : 'Organisation','a_attr':{'href':'javascript:void()'},
    'children' : [
        { 'text' : 'Organisation Unit','a_attr' : {'href':'setup/org-unit'},'type':'links' },
        { 'text' : 'Organisation Unit Heads','a_attr' : {'href':'setup/org-unit-head'},'type':'links' },
        { 'text' : 'Organisation Unit Types','a_attr' : {'href':'setup/org-unit-types'},'type':'links' },
        { 'text' : 'Organisation Unit History','a_attr' : {'href':'setup/org-unit-history'},'type':'links' },
    ]},
    {'text' : 'Programme','a_attr':{'href':'javascript:void()'},
    'children' : [
        { 'text' : 'Programme','a_attr' : {'href':'setup/programmes'},'type':'links' },
        { 'text' : 'Programme Category','a_attr' : {'href':'setup/programme-category'},'type':'links' },
        { 'text' : 'Programme Type','a_attr' : {'href':'setup/programme-type'},'type':'links' },
		{ 'text' : 'Option','a_attr' : {'href':'setup/option'},'type':'links' },
        { 'text' : 'Option Course','a_attr' : {'href':'setup/option-course'},'type':'links' },
        { 'text' : 'Programme Curriculum Semester','a_attr' : {'href':'setup/prog-curriculum-semester'},'type':'links' },
        { 'text' : 'KUCCPS Programme Map','a_attr' : {'href':'setup/kuccps-prog-map'},'type':'links' },
    ]},
	{'text' : 'Academic Levels & Sessions','a_attr':{'href':'javascript:void()'},
    'children' : [
        { 'text' : 'Semester Code','a_attr' : {'href':'setup/semester-code'},'type':'links' },
        { 'text' : 'Academic Levels','a_attr' : {'href':'setup/academic-levels'},'type':'links' },
        { 'text' : 'Academic Session','a_attr' : {'href':'setup/academic-session'},'type':'links' },
        { 'text' : 'Academic Session Semester','a_attr' : {'href':'setup/academic-session-semester'},'type':'links' },
        
    ]},
	{'text' : 'Cohort','a_attr':{'href':'javascript:void()'},
    'children' : [
        { 'text' : 'Cohort','a_attr' : {'href':'setup/cohort'},'type':'links' },
        { 'text' : 'Cohort Session','a_attr' : {'href':'setup/cohort-session'},'type':'links' },
        
        
    ]},
]
";

$this->registerJs(
<<<JS
let clearBtn = $("#menu-clear");
clearBtn.hide();
$.jstree.defaults.plugins = ['html_data','types',"search"];
$.jstree.defaults.search = {case_insensitive: false,show_only_matches: true}
$.jstree.defaults.state.preserve_loaded = true;
$.jstree.defaults.types = {"default":{"icon":"bi bi-folder-fill text-success pr-3"},"links":{"icon":"bi bi-link text-primary"}};
const mTree = $('div.menu-tree-container')
    .jstree({
        'core' : { 'data' : $jsonMenu },
    })
    .on('ready.jstree', function () {  $(this).jstree('open_all') } )
    .on('search.jstree', function (nodes, str) {
        if (str.nodes.length===0) {
            $(this).jstree(true).hide_all();
        }
    })
    .on("select_node.jstree", function (e, data) {
        if((data.node.a_attr.href).indexOf('void(') === -1){
            if( typeof (data.node.a_attr.target) == "undefined" )
                document.location = data.node.a_attr.href;
            else
                window.open( data.node.a_attr.href, data.node.a_attr.target );
        }
    });
    $("#menu-search-input").on('keyup change',function() {
        $.each($('div.menu-container > div'),function(){ $(this).jstree(true).show_all(); });
        mTree.jstree('search', $(this).val());
        $("#menu-search-input").val() ? clearBtn.show() : clearBtn.hide();
    });
    clearBtn.on('click',function () {
        mTree.jstree("clear_search");
        $("#menu-search-input").val('').trigger('change');
    });
    
JS,

);