<?php

    $inputs_left = array(
        //Single line inputs
        "This is a line of text",
        "This is a line of text",
        "This is a line of text",
        "for (std::vector<int>::iterator iter = vec.begin(); iter != vec.end(); ++vec)",
        "for (std::vector<int>::iterator iter = vec.begin(); iter != vec.end(); ++vec)",
        "for (std::vector<int>::iterator iter = vec.begin(); iter != vec.end(); ++vec)",
        "\$php_variable .= \"some value\"",
        "\$php_variable .= \"some value\"",
        "\$php_variable .= \"some value\"",

        //Multi line inputs
        "<html>
            <head>
                <script src=\"some_addr.js\" />
                <title>Sample title</title>
                <meta charset=\"utf-8\" />
            </head>
            <body>
                <h1>Header</h1>
                <pre>A pre block</pre>
                <div>A div <div>with inner div and <span class=\"My class\">a span</span></div></div>
                Some chinese: 怎麼連空間都那麼狹隘.
            </body>
        </html>",
        
        "<html>
            <head>
                <script src=\"some_addr.js\" />
                <title>Sample title</title>
                <meta charset=\"utf-8\" />
            </head>
            <body>
                <h1>Header</h1>
                <pre>A pre block</pre>
                <div>A div <div>with inner div and <span class=\"My class\">a span</span></div></div>
                Some chinese: 怎麼連空間都那麼狹隘.
            </body>
        </html>",
        
        "<html>
            <head>
                <script src=\"some_addr.js\" />
                <title>Sample title</title>
                <meta charset=\"utf-8\" />
            </head>
            <body>
                <h1>Header</h1>
                <pre>A pre block</pre>
                <div>A div <div>with inner div and <span class=\"My class\">a span</span></div></div>
                Some chinese: 怎麼連空間都那麼狹隘.
            </body>
        </html>"

    );
    
    $inputs_right = array(
        //Single line inputs
        //Change a sequence
        "This is a big fat line of text",
        //Remove a senquence
        "This line of text",
        //Change entire line
        "Some pretty text",

        //Change a sequence
        "for (std::vector<int>::iterator iter = vec.cbegin(); iter != vec.end(); ++vec)",
        //Remove a senquence
        "for (std::vector<int> iter = vec.begin(); iter != vec.end(); ++vec)",
        //Change entire line
        "while (true) ;",
        
        //Change a sequence
        "\$php_variable .= \"some random value\"",
        //Remove a senquence
        "\$php_variable .= \"value\"",
        //Change entire line
        "int i = 5;",

        //Multi line inputs
        //Change multiple lines
        "<html>
            <head>
                <script src=\"other.js\" />
                <title>Awesome title</title>
                <new_tag></new_tag>
                <new_tag>Another new</new_tag>
            </head>
            <body>
                <pre>A pre block</pre>
                <div>A inner div and <span class=\"My class\">a span</span></div>
                Some chinese: 怎麼那麼連空都間狹隘.
            </body>
        </html>",
        
        "<html>
            <head>
                <title>Sample title</title>
                <script src=\"some_addr.js\" />
                <meta charset=\"utf-16\" />
            </head>
        </html>",
        
        //Keep it the same
        "<html>
            <head>
                <script src=\"some_addr.js\" />
                <title>Sample title</title>
                <meta charset=\"utf-8\" />
            </head>
            <body>
                <h1>Header</h1>
                <pre>A pre block</pre>
                <div>A div <div>with inner div and <span class=\"My class\">a span</span></div></div>
                Some chinese: 怎麼連空間都那麼狹隘.
            </body>
        </html>"
    );

    global $outputs;
    $outputs = array(
        'SideBySide' => array(),
        'Inline' => array(),
        'Unified' => array(),
        'Context' => array(),
    );

    //Side by side expected results:
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><td class="Left"><span>This is a <del></del>line of text</span>&#xA0;</td><th>1</th><td class="Right"><span>This is a <ins>big fat </ins>line of text</span></td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><td class="Left"><span>This <del>is a </del>line of text</span>&#xA0;</td><th>1</th><td class="Right"><span>This <ins></ins>line of text</span></td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><td class="Left"><span><del>This is a line of</del> text</span>&#xA0;</td><th>1</th><td class="Right"><span><ins>Some pretty</ins> text</span></td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><td class="Left"><span>for (std::vector&lt;int&gt;::iterator iter = vec.<del></del>begin(); iter != vec.end(); ++vec)</span>&#xA0;</td><th>1</th><td class="Right"><span>for (std::vector&lt;int&gt;::iterator iter = vec.<ins>c</ins>begin(); iter != vec.end(); ++vec)</span></td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><td class="Left"><span>for (std::vector&lt;int&gt;<del>::iterator</del> iter = vec.begin(); iter != vec.end(); ++vec)</span>&#xA0;</td><th>1</th><td class="Right"><span>for (std::vector&lt;int&gt;<ins></ins> iter = vec.begin(); iter != vec.end(); ++vec)</span></td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><td class="Left"><span>for (std::vector&lt;int&gt;::iterator iter = vec.begin(); iter != vec.end(); ++vec)</span>&#xA0;</td><th>1</th><td class="Right"><span>while (true) ;</span></td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><td class="Left"><span>$php_variable .= "some <del></del>value"</span>&#xA0;</td><th>1</th><td class="Right"><span>$php_variable .= "some <ins>random </ins>value"</span></td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><td class="Left"><span>$php_variable .= "<del>some </del>value"</span>&#xA0;</td><th>1</th><td class="Right"><span>$php_variable .= "<ins></ins>value"</span></td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><td class="Left"><span>$php_variable .= "some value"</span>&#xA0;</td><th>1</th><td class="Right"><span>int i = 5;</span></td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeEqual"><tr><th>1</th><td class="Left"><span>&lt;html&gt;
</span>&#xA0;</td><th>1</th><td class="Right"><span>&lt;html&gt;
</span>&#xA0;</td></tr><tr><th>2</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;head&gt;
</span>&#xA0;</td><th>2</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;head&gt;
</span>&#xA0;</td></tr></tbody><tbody class="ChangeReplace"><tr><th>3</th><td class="Left"><span><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;script src="some_addr.js" /&gt;
</span></span>&#xA0;</td><th>3</th><td class="Right">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;script src="other.js" /&gt;
</td></tr><tr><th>4</th><td class="Left"><span><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;title&gt;Sample title&lt;/title&gt;
</span></span>&#xA0;</td><th>4</th><td class="Right">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;title&gt;Awesome title&lt;/title&gt;
</td></tr><tr><th>5</th><td class="Left"><span><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;meta charset="utf-8" /&gt;
</span></span>&#xA0;</td><th>5</th><td class="Right">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;new_tag&gt;&lt;/new_tag&gt;
</td></tr><tr><th>&#xA0;</th><td class="Left"><span>&#xA0;</span>&#xA0;</td><th>6</th><td class="Right">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;new_tag&gt;Another new&lt;/new_tag&gt;
</td></tr></tbody><tbody class="ChangeEqual"><tr><th>6</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/head&gt;
</span>&#xA0;</td><th>7</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/head&gt;
</span>&#xA0;</td></tr><tr><th>7</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;body&gt;
</span>&#xA0;</td><th>8</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;body&gt;
</span>&#xA0;</td></tr></tbody><tbody class="ChangeDelete"><tr><th>8</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;h1&gt;Header&lt;/h1&gt;
</del>&#xA0;</td><th>&#xA0;</th><td class="Right">&#xA0;</td></tr></tbody><tbody class="ChangeEqual"><tr><th>9</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;pre&gt;A pre block&lt;/pre&gt;
</span>&#xA0;</td><th>9</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;pre&gt;A pre block&lt;/pre&gt;
</span>&#xA0;</td></tr></tbody><tbody class="ChangeReplace"><tr><th>10</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;div&gt;A <del>div &lt;div&gt;with inner div and &lt;span class="My class"&gt;a span&lt;/span&gt;&lt;/div</del>&gt;&lt;/div&gt;
</span>&#xA0;</td><th>10</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;div&gt;A <ins>inner div and &lt;span class="My class"&gt;a span&lt;/span</ins>&gt;&lt;/div&gt;
</span></td></tr><tr><th>11</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;Some chinese: 怎麼<del>連空間都那麼</del>狹隘.
</span>&#xA0;</td><th>11</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;Some chinese: 怎麼<ins>那麼連空都間</ins>狹隘.
</span></td></tr></tbody><tbody class="ChangeEqual"><tr><th>12</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/body&gt;
</span>&#xA0;</td><th>12</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/body&gt;
</span>&#xA0;</td></tr><tr><th>13</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0;&lt;/html&gt;</span>&#xA0;</td><th>13</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0;&lt;/html&gt;</span>&#xA0;</td></tr></tbody></table>';
    $outputs['SideBySide'][] = '<table class="Differences DifferencesSideBySide"><thead><tr><th colspan="2">old/left</th><th colspan="2">new/right</th></tr></thead><tbody class="ChangeEqual"><tr><th>1</th><td class="Left"><span>&lt;html&gt;
</span>&#xA0;</td><th>1</th><td class="Right"><span>&lt;html&gt;
</span>&#xA0;</td></tr><tr><th>2</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;head&gt;
</span>&#xA0;</td><th>2</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;head&gt;
</span>&#xA0;</td></tr></tbody><tbody class="ChangeInsert"><tr><th>&#xA0;</th><td class="Left">&#xA0;</td><th>3</th><td class="Right"><ins>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;title&gt;Sample title&lt;/title&gt;
</ins>&#xA0;</td></tr></tbody><tbody class="ChangeEqual"><tr><th>3</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;script src="some_addr.js" /&gt;
</span>&#xA0;</td><th>4</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;script src="some_addr.js" /&gt;
</span>&#xA0;</td></tr></tbody><tbody class="ChangeReplace"><tr><th>4</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;title&gt;Sample title&lt;/title&gt;
</span>&#xA0;</td><th>5</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;meta charset="utf-16" /&gt;
</span></td></tr><tr><th>5</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;meta charset="utf-8" /&gt;
</span>&#xA0;</td><th>&#xA0;</th><td class="Right">&#xA0;</td></tr></tbody><tbody class="ChangeEqual"><tr><th>6</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/head&gt;
</span>&#xA0;</td><th>6</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/head&gt;
</span>&#xA0;</td></tr></tbody><tbody class="ChangeDelete"><tr><th>7</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;body&gt;
</del>&#xA0;</td><th>&#xA0;</th><td class="Right">&#xA0;</td></tr><tr><th>8</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;h1&gt;Header&lt;/h1&gt;
</del>&#xA0;</td><th>&#xA0;</th><td class="Right">&#xA0;</td></tr><tr><th>9</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;pre&gt;A pre block&lt;/pre&gt;
</del>&#xA0;</td><th>&#xA0;</th><td class="Right">&#xA0;</td></tr><tr><th>10</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;div&gt;A div &lt;div&gt;with inner div and &lt;span class="My class"&gt;a span&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;
</del>&#xA0;</td><th>&#xA0;</th><td class="Right">&#xA0;</td></tr><tr><th>11</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;Some chinese: 怎麼連空間都那麼狹隘.
</del>&#xA0;</td><th>&#xA0;</th><td class="Right">&#xA0;</td></tr><tr><th>12</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/body&gt;
</del>&#xA0;</td><th>&#xA0;</th><td class="Right">&#xA0;</td></tr></tbody><tbody class="ChangeEqual"><tr><th>13</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0;&lt;/html&gt;</span>&#xA0;</td><th>7</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0;&lt;/html&gt;</span>&#xA0;</td></tr></tbody></table>';
    $outputs['SideBySide'][] = '';

    //Inline HTML expected outputs
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><th>&#xA0;</th><td class="Left"><span>This is a <del></del>line of text</span></td></tr><tr><th>&#xA0;</th><th>1</th><td class="Right"><span>This is a <ins>big fat </ins>line of text</span></td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><th>&#xA0;</th><td class="Left"><span>This <del>is a </del>line of text</span></td></tr><tr><th>&#xA0;</th><th>1</th><td class="Right"><span>This <ins></ins>line of text</span></td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><th>&#xA0;</th><td class="Left"><span><del>This is a line of</del> text</span></td></tr><tr><th>&#xA0;</th><th>1</th><td class="Right"><span><ins>Some pretty</ins> text</span></td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><th>&#xA0;</th><td class="Left"><span>for (std::vector&lt;int&gt;::iterator iter = vec.<del></del>begin(); iter != vec.end(); ++vec)</span></td></tr><tr><th>&#xA0;</th><th>1</th><td class="Right"><span>for (std::vector&lt;int&gt;::iterator iter = vec.<ins>c</ins>begin(); iter != vec.end(); ++vec)</span></td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><th>&#xA0;</th><td class="Left"><span>for (std::vector&lt;int&gt;<del>::iterator</del> iter = vec.begin(); iter != vec.end(); ++vec)</span></td></tr><tr><th>&#xA0;</th><th>1</th><td class="Right"><span>for (std::vector&lt;int&gt;<ins></ins> iter = vec.begin(); iter != vec.end(); ++vec)</span></td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><th>&#xA0;</th><td class="Left"><span>for (std::vector&lt;int&gt;::iterator iter = vec.begin(); iter != vec.end(); ++vec)</span></td></tr><tr><th>&#xA0;</th><th>1</th><td class="Right"><span>while (true) ;</span></td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><th>&#xA0;</th><td class="Left"><span>$php_variable .= "some <del></del>value"</span></td></tr><tr><th>&#xA0;</th><th>1</th><td class="Right"><span>$php_variable .= "some <ins>random </ins>value"</span></td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><th>&#xA0;</th><td class="Left"><span>$php_variable .= "<del>some </del>value"</span></td></tr><tr><th>&#xA0;</th><th>1</th><td class="Right"><span>$php_variable .= "<ins></ins>value"</span></td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeReplace"><tr><th>1</th><th>&#xA0;</th><td class="Left"><span>$php_variable .= "some value"</span></td></tr><tr><th>&#xA0;</th><th>1</th><td class="Right"><span>int i = 5;</span></td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeEqual"><tr><th>1</th><th>1</th><td class="Left">&lt;html&gt;
</td></tr><tr><th>2</th><th>2</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;head&gt;
</td></tr></tbody><tbody class="ChangeReplace"><tr><th>3</th><th>&#xA0;</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;script src="some_addr.js" /&gt;
</span></td></tr><tr><th>4</th><th>&#xA0;</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;title&gt;Sample title&lt;/title&gt;
</span></td></tr><tr><th>5</th><th>&#xA0;</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;meta charset="utf-8" /&gt;
</span></td></tr><tr><th>&#xA0;</th><th>3</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;script src="other.js" /&gt;
</span></td></tr><tr><th>&#xA0;</th><th>4</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;title&gt;Awesome title&lt;/title&gt;
</span></td></tr><tr><th>&#xA0;</th><th>5</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;new_tag&gt;&lt;/new_tag&gt;
</span></td></tr><tr><th>&#xA0;</th><th>6</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;new_tag&gt;Another new&lt;/new_tag&gt;
</span></td></tr></tbody><tbody class="ChangeEqual"><tr><th>6</th><th>7</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/head&gt;
</td></tr><tr><th>7</th><th>8</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;body&gt;
</td></tr></tbody><tbody class="ChangeDelete"><tr><th>8</th><th>&#xA0;</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;h1&gt;Header&lt;/h1&gt;
</del>&#xA0;</td></tr></tbody><tbody class="ChangeEqual"><tr><th>9</th><th>9</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;pre&gt;A pre block&lt;/pre&gt;
</td></tr></tbody><tbody class="ChangeReplace"><tr><th>10</th><th>&#xA0;</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;div&gt;A <del>div &lt;div&gt;with inner div and &lt;span class="My class"&gt;a span&lt;/span&gt;&lt;/div</del>&gt;&lt;/div&gt;
</span></td></tr><tr><th>11</th><th>&#xA0;</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;Some chinese: 怎麼<del>連空間都那麼</del>狹隘.
</span></td></tr><tr><th>&#xA0;</th><th>10</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;div&gt;A <ins>inner div and &lt;span class="My class"&gt;a span&lt;/span</ins>&gt;&lt;/div&gt;
</span></td></tr><tr><th>&#xA0;</th><th>11</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;Some chinese: 怎麼<ins>那麼連空都間</ins>狹隘.
</span></td></tr></tbody><tbody class="ChangeEqual"><tr><th>12</th><th>12</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/body&gt;
</td></tr><tr><th>13</th><th>13</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0;&lt;/html&gt;</td></tr></tbody></table>';
    $outputs['Inline'][] = '<table class="Differences DifferencesInline"><thead><tr><th>Old</th><th>New</th><th>Differences</th></tr></thead><tbody class="ChangeEqual"><tr><th>1</th><th>1</th><td class="Left">&lt;html&gt;
</td></tr><tr><th>2</th><th>2</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;head&gt;
</td></tr></tbody><tbody class="ChangeInsert"><tr><th>&#xA0;</th><th>3</th><td class="Right"><ins>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;title&gt;Sample title&lt;/title&gt;
</ins>&#xA0;</td></tr></tbody><tbody class="ChangeEqual"><tr><th>3</th><th>4</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;script src="some_addr.js" /&gt;
</td></tr></tbody><tbody class="ChangeReplace"><tr><th>4</th><th>&#xA0;</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;title&gt;Sample title&lt;/title&gt;
</span></td></tr><tr><th>5</th><th>&#xA0;</th><td class="Left"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;meta charset="utf-8" /&gt;
</span></td></tr><tr><th>&#xA0;</th><th>5</th><td class="Right"><span>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;meta charset="utf-16" /&gt;
</span></td></tr></tbody><tbody class="ChangeEqual"><tr><th>6</th><th>6</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/head&gt;
</td></tr></tbody><tbody class="ChangeDelete"><tr><th>7</th><th>&#xA0;</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;body&gt;
</del>&#xA0;</td></tr><tr><th>8</th><th>&#xA0;</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;h1&gt;Header&lt;/h1&gt;
</del>&#xA0;</td></tr><tr><th>9</th><th>&#xA0;</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;pre&gt;A pre block&lt;/pre&gt;
</del>&#xA0;</td></tr><tr><th>10</th><th>&#xA0;</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;div&gt;A div &lt;div&gt;with inner div and &lt;span class="My class"&gt;a span&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;
</del>&#xA0;</td></tr><tr><th>11</th><th>&#xA0;</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;Some chinese: 怎麼連空間都那麼狹隘.
</del>&#xA0;</td></tr><tr><th>12</th><th>&#xA0;</th><td class="Left"><del>&#xA0; &#xA0; &#xA0; &#xA0; &#xA0; &#xA0;&lt;/body&gt;
</del>&#xA0;</td></tr></tbody><tbody class="ChangeEqual"><tr><th>13</th><th>7</th><td class="Left">&#xA0; &#xA0; &#xA0; &#xA0;&lt;/html&gt;</td></tr></tbody></table>';
    $outputs['Inline'][] = '';

    //Expected output from textual based Unified renderer
    $outputs['Unified'][] = '@@ -1,1 +1,1 @@
-This is a line of text
+This is a big fat line of text';
    $outputs['Unified'][] = '@@ -1,1 +1,1 @@
-This is a line of text
+This line of text';
    $outputs['Unified'][] = '@@ -1,1 +1,1 @@
-This is a line of text
+Some pretty text';
    $outputs['Unified'][] = '@@ -1,1 +1,1 @@
-for (std::vector<int>::iterator iter = vec.begin(); iter != vec.end(); ++vec)
+for (std::vector<int>::iterator iter = vec.cbegin(); iter != vec.end(); ++vec)';
    $outputs['Unified'][] = '@@ -1,1 +1,1 @@
-for (std::vector<int>::iterator iter = vec.begin(); iter != vec.end(); ++vec)
+for (std::vector<int> iter = vec.begin(); iter != vec.end(); ++vec)';
    $outputs['Unified'][] = '@@ -1,1 +1,1 @@
-for (std::vector<int>::iterator iter = vec.begin(); iter != vec.end(); ++vec)
+while (true) ;';
    $outputs['Unified'][] = '@@ -1,1 +1,1 @@
-$php_variable .= "some value"
+$php_variable .= "some random value"';
    $outputs['Unified'][] = '@@ -1,1 +1,1 @@
-$php_variable .= "some value"
+$php_variable .= "value"';
    $outputs['Unified'][] = '@@ -1,1 +1,1 @@
-$php_variable .= "some value"
+int i = 5;';
    $outputs['Unified'][] = '@@ -1,13 +1,13 @@
 <html>
             <head>
-                <script src="some_addr.js" />
-                <title>Sample title</title>
-                <meta charset="utf-8" />
+                <script src="other.js" />
+                <title>Awesome title</title>
+                <new_tag></new_tag>
+                <new_tag>Another new</new_tag>
             </head>
             <body>
-                <h1>Header</h1>
                 <pre>A pre block</pre>
-                <div>A div <div>with inner div and <span class="My class">a span</span></div></div>
-                Some chinese: 怎麼連空間都那麼狹隘.
+                <div>A inner div and <span class="My class">a span</span></div>
+                Some chinese: 怎麼那麼連空都間狹隘.
             </body>
         </html>';
    $outputs['Unified'][] = '@@ -1,13 +1,7 @@
 <html>
             <head>
+                <title>Sample title</title>
                 <script src="some_addr.js" />
-                <title>Sample title</title>
-                <meta charset="utf-8" />
+                <meta charset="utf-16" />
             </head>
-            <body>
-                <h1>Header</h1>
-                <pre>A pre block</pre>
-                <div>A div <div>with inner div and <span class="My class">a span</span></div></div>
-                Some chinese: 怎麼連空間都那麼狹隘.
-            </body>
         </html>';
    $outputs['Unified'][] = '';

    //Expected output from textual context renderer
    $outputs['Context'][] = '***************
*** 1 ****
! This is a line of text
--- 1 ----
! This is a big fat line of text';
    $outputs['Context'][] = '***************
*** 1 ****
! This is a line of text
--- 1 ----
! This line of text';
    $outputs['Context'][] = '***************
*** 1 ****
! This is a line of text
--- 1 ----
! Some pretty text';
    $outputs['Context'][] = '***************
*** 1 ****
! for (std::vector<int>::iterator iter = vec.begin(); iter != vec.end(); ++vec)
--- 1 ----
! for (std::vector<int>::iterator iter = vec.cbegin(); iter != vec.end(); ++vec)';
    $outputs['Context'][] = '***************
*** 1 ****
! for (std::vector<int>::iterator iter = vec.begin(); iter != vec.end(); ++vec)
--- 1 ----
! for (std::vector<int> iter = vec.begin(); iter != vec.end(); ++vec)';
    $outputs['Context'][] = '***************
*** 1 ****
! for (std::vector<int>::iterator iter = vec.begin(); iter != vec.end(); ++vec)
--- 1 ----
! while (true) ;';
    $outputs['Context'][] = '***************
*** 1 ****
! $php_variable .= "some value"
--- 1 ----
! $php_variable .= "some random value"';
    $outputs['Context'][] = '***************
*** 1 ****
! $php_variable .= "some value"
--- 1 ----
! $php_variable .= "value"';
    $outputs['Context'][] = '***************
*** 1 ****
! $php_variable .= "some value"
--- 1 ----
! int i = 5;';
    $outputs['Context'][] = '***************
*** 1,13 ****
    <html>
                <head>
!                 <script src="some_addr.js" />
!                 <title>Sample title</title>
!                 <meta charset="utf-8" />
                </head>
                <body>
-                 <h1>Header</h1>
                    <pre>A pre block</pre>
!                 <div>A div <div>with inner div and <span class="My class">a span</span></div></div>
!                 Some chinese: 怎麼連空間都那麼狹隘.
                </body>
            </html>
--- 1,13 ----
    <html>
                <head>
!                 <script src="other.js" />
!                 <title>Awesome title</title>
!                 <new_tag></new_tag>
!                 <new_tag>Another new</new_tag>
                </head>
                <body>
                    <pre>A pre block</pre>
!                 <div>A inner div and <span class="My class">a span</span></div>
!                 Some chinese: 怎麼那麼連空都間狹隘.
                </body>
            </html>';
    $outputs['Context'][] = '***************
*** 1,13 ****
    <html>
                <head>
                    <script src="some_addr.js" />
!                 <title>Sample title</title>
!                 <meta charset="utf-8" />
                </head>
-             <body>
-                 <h1>Header</h1>
-                 <pre>A pre block</pre>
-                 <div>A div <div>with inner div and <span class="My class">a span</span></div></div>
-                 Some chinese: 怎麼連空間都那麼狹隘.
-             </body>
            </html>
--- 1,7 ----
    <html>
                <head>
+                 <title>Sample title</title>
                    <script src="some_addr.js" />
!                 <meta charset="utf-16" />
                </head>
            </html>';
    $outputs['Context'][] = '';
    
    function killWhitespaces($array){
        $ar = array();
        foreach($array as $string){
            $string = preg_replace("/\s+/", "", $string);
            $ar[] = $string;
        }
        return $ar;
    }

    $outputs['SideBySide'] = killWhitespaces($outputs['SideBySide']);
    $outputs['Inline'] = killWhitespaces($outputs['Inline']);
    $outputs['Unified'] = killWhitespaces($outputs['Unified']);
    $outputs['Context'] = killWhitespaces($outputs['Context']);


?>