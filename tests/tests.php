<?php
    require_once dirname(__FILE__).'/../lib/Diff.php';
    require_once dirname(__FILE__).'/../lib/Diff/SequenceMatcher.php';
    require_once dirname(__FILE__).'/../lib/Diff/Renderer/Text/Unified.php';
    require_once dirname(__FILE__).'/../lib/Diff/Renderer/Text/Context.php';
    require_once dirname(__FILE__).'/../lib/Diff/Renderer/Html/Array.php';
    require_once dirname(__FILE__).'/../lib/Diff/Renderer/Html/Inline.php';
    require_once dirname(__FILE__).'/../lib/Diff/Renderer/Html/SideBySide.php';

    require_once dirname(__FILE__).'/test_data.php';
    
    $producedOutputs = array(
        'SideBySide' => array(),
        'Inline' => array(),
        'Unified' => array(),
        'Context' => array(),
    );

    for($i = 0; $i < count($inputs_left); $i++) {
        $left = $inputs_left[$i];
        $right = $inputs_right[$i];

        $diff = new Diff(explode("\n", $left), explode("\n", $right));

        $renderer = new Diff_Renderer_Html_SideBySide(array('title_a' => 'old/left', 'title_b' => 'new/right'));
        $result = trim($diff->render($renderer));
        $producedOutputs['SideBySide'][] = $result;

        $renderer = new Diff_Renderer_Html_Inline();
        $result = trim($diff->render($renderer));
        $producedOutputs['Inline'][] = $result;
        
        $renderer = new Diff_Renderer_Text_Unified();
        $result = trim($diff->render($renderer));
        $producedOutputs['Unified'][] = $result;
        
        $renderer = new Diff_Renderer_Text_Context();
        $result = trim($diff->render($renderer));
        $producedOutputs['Context'][] = $result;
    }
    
    function getDifference(string $expected, string $real){
        $expected = preg_replace("/\s+/", "", $expected);
        $real = preg_replace("/\s+/", "", $real);
        $out = "";
        for($i = 0; $i < min(strlen($real), strlen($expected)); $i++){
            if ($real{$i} !== $expected{$i})
                $out .= "\tNot matching at $i, got ".$real{$i}."(".ord($real{$i}).") but expected ".$expected{$i}."(".ord($expected{$i}).")\n";
        }

        if (strlen($expected) != strlen($real))
            $out .= "\tMismatched length. Expected ".strlen($expected)." but got ".strlen($real)."\n";
        
        return $out;
    }

    echo "<html>";

    foreach($producedOutputs as $name => $array){
        for($i = 0; $i < count($array); $i++){
            $strDiff = getDifference($outputs[$name][$i], $array[$i]);
            if (strlen($strDiff) != 0){
                $strDiff = "At $name at index $i: ".$strDiff;
                echo $strDiff;
            }
        }
    }

    echo "</html>";
?>