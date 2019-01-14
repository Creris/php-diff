<?php
    $runOnOld = false;
    $runsPerRenderer = 50;
    $timeWindow = 1;

    if (!$runOnOld){
        require_once dirname(__FILE__).'/../lib/Diff.php';
        require_once dirname(__FILE__).'/../lib/Diff/SequenceMatcher.php';
        require_once dirname(__FILE__).'/../lib/Diff/Renderer/Text/Unified.php';
        require_once dirname(__FILE__).'/../lib/Diff/Renderer/Text/Context.php';
        require_once dirname(__FILE__).'/../lib/Diff/Renderer/Html/Array.php';
        require_once dirname(__FILE__).'/../lib/Diff/Renderer/Html/Inline.php';
        require_once dirname(__FILE__).'/../lib/Diff/Renderer/Html/SideBySide.php';
    }
    else{
        require_once dirname(__FILE__).'/../old/Diff.php';
        require_once dirname(__FILE__).'/../old/Diff/SequenceMatcher.php';
        require_once dirname(__FILE__).'/../old/Diff/Renderer/Text/Unified.php';
        require_once dirname(__FILE__).'/../old/Diff/Renderer/Text/Context.php';
        require_once dirname(__FILE__).'/../old/Diff/Renderer/Html/Array.php';
        require_once dirname(__FILE__).'/../old/Diff/Renderer/Html/Inline.php';
        require_once dirname(__FILE__).'/../old/Diff/Renderer/Html/SideBySide.php';
    }

    function loadData(){
        $rightFile = file_get_contents(dirname(__FILE__)."/benchmark_data_right.txt");
        $leftFile = file_get_contents(dirname(__FILE__)."/benchmark_data_left.txt");
        return array($rightFile, $leftFile);
    }

    list($left, $right) = loadData();

    function runTimed($stringA, $stringB, $renderer){
        global $timeWindow;

        $diff = new Diff(explode("\n", $stringA), explode("\n", $stringB));
        $timeOld = microtime(true);
        for($i = 0; $i < $timeWindow; $i++)
            $diff->render($renderer);
        $timeNew = microtime(true);
        return ($timeNew - $timeOld);
    }

    $renderers = array(
        new Diff_Renderer_Html_SideBySide(),
        new Diff_Renderer_Html_Inline(),
        new Diff_Renderer_Text_Unified(),
        new Diff_Renderer_Text_Context()
    );

    $renderersName = array(
        'Side by Side',
        'Inline',
        'Unified',
        'Context'
    );

    $times = array(
        array(),
        array(),
        array(),
        array()
    );

    for($rend = 0; $rend < count($renderers); $rend++){
        for($i = 0; $i < $runsPerRenderer; $i++){
            $times[$rend][] = runTimed($left, $right, $renderers[$rend]);
        }
    }

    function average($array){
        $count = count($array);
        $sum = 0;
        foreach($array as $val){
            $sum += $val;
        }

        return $sum / $count;
    }

    for($i = 0; $i < count($renderers); $i++){
        echo $renderersName[$i]." renderer: ";
        $min = min($times[$i]);
        $max = max($times[$i]);
        $avg = average($times[$i]);
        echo "Min: ".$min."ms Max: ".$max."ms Average: ".$avg."ms\n";
    }
?>