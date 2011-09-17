<? 

require('../config.php');
require('lib/Example.class.php');
$benchmark_start = microtime_float();

$local = true;

// Redefine location on local machine for examples in processing trunk
if ($local) {
  //define('BASEDIR',    '/Users/REAS/Documents/reas@processing.org/trunk/');
  define('EXAMPLESOURCEDIR', '/Users/REAS/Documents/reas@processing.org/trunk/processing/java/examples/');
} else {
  define('EXAMPLESOURCEDIR', '/Users/REAS/Documents/reas@processing.org/trunk/processing/java/examples/');
}
//define('CONTENTDIR', BASEDIR.'processing/java/');
//define('EXAMPLESDIR',	BASEDIR.'learning/');


// Update the files on the server via SVN

// look for the .subversion folder somewhere else
// otherwise will go looking for /home/root/.subversion or some other user
$where = CONTENTDIR . 'examples';
$there = CONTENTDIR;
putenv('HOME=' . CONTENTDIR);

// do the initial checkout
//`cd /var/www/processing && /usr/local/bin/svn co svn://processing.org/trunk/web/content/`;

if (!$local) {
  `cd $there && /usr/local/bin/svn update examples_basics.xml`;
  `cd $there && /usr/local/bin/svn update examples_topics.xml`;
  `cd $where && /usr/local/bin/svn update`;
}


# --------------------------------- Basics

$categories = get_examples_list('examples_basics.xml');
$break_after = array('Control', 'Math');
$subdir = 'Basics';
$dir = EXAMPLESOURCEDIR . $subdir.'/';

$count = 0;
foreach ($categories as $cat => $array) {
	echo $cat;
    if ($dp = opendir($dir.$cat)) {
        while ($fp = readdir($dp)) {
            if (substr($fp, 0, 1) != '.') {
                $ex = new Example($fp, $subdir."/".$cat, $subdir);
                //$ex = new Example($fp, $cat);
                if (!$local) {
                  $ex->output_file($categories);
                } else {
                  $ex->output_file($categories, "../../");
                }
                $count++;
            }
        }
    }
}

$page = new Page('Basics', 'Basics', "", "../../");
$page->subtemplate('template.examples-basics.html');

$html = "<div class=\"ref-col\">\n";
foreach ($categories as $cat => $array) {
    
    #$html .= "<h3><img src=\"images/".strtolower(removesymbols($cat)).".gif\" alt=\"$cat\" /></h3>\n<p>";
    $html .= "<p><br /><b>$cat</b><br /><br />";
    foreach ($array as $file => $name) {
        $thisfile = strtolower($file);
        $html .= "\t<a href=\"$thisfile\">$name</a><br />\n";
    }
    #echo '</p>';
    $html .= '</p>';
    
    if (in_array($cat, $break_after)) {
        $html .= "</div><div class=\"ref-col\">";
    }
}
$html .= "</div>";

$page->content($html);
writeFile('learning/'.strtolower($subdir).'/index.html', $page->out());

// Copy over a shared core.jar
//if (!copy(CONTENTDIR . 'examples/core.jar',
//	  EXAMPLESDIR.strtolower($subdir).'/media/core.jar')) {
//  echo 'Could not copy core.jar to ' . $subdir . '.';
//}
//if (!copy(CONTENTDIR . 'examples/loading.gif',
//	  EXAMPLESDIR.strtolower($subdir).'/media/loading.gif')) {
//  echo 'Could not copy loading.gif to ' . $subdir . '.';
//}


# --------------------------------- Topics

$categories = get_examples_list('examples_topics.xml');
$break_after = array('GUI', 'Textures');
$subdir = 'Topics';
$dir = EXAMPLESOURCEDIR .$subdir.'/';

$count = 0;
foreach ($categories as $cat => $array) {
    if ($dp = opendir($dir.$cat)) {
        while ($fp = readdir($dp)) {
            if (substr($fp, 0, 1) != '.') {
                $ex = new Example($fp, $subdir."/".$cat, $subdir);
                //$ex = new Example($fp, $cat);
                if (!$local) {
                  $ex->output_file($categories);
                } else {
                  $ex->output_file($categories, "../../");
                }
                $count++;
            }
        }
    }
}

$page = new Page('Topics', 'Topics', "", "../../");
$page->subtemplate('template.examples-topics.html');

$html = "<div class=\"ref-col\">\n";
foreach ($categories as $cat => $array) {
    
    #$html .= "<h3><img src=\"images/".strtolower(removesymbols($cat)).".gif\" alt=\"$cat\" /></h3>\n<p>";
    $html .= "<p><br /><b>$cat</b><br /><br />";
    foreach ($array as $file => $name) {
        $thisfile = strtolower($file);
        $html .= "\t<a href=\"$thisfile\">$name</a><br />\n";
    }
    #echo '</p>';
    $html .= '</p>';
    
    if (in_array($cat, $break_after)) {
        $html .= "</div><div class=\"ref-col\">";
    }
}
$html .= "</div>";

$page->content($html);
writeFile('learning/'.strtolower($subdir).'/index.html', $page->out());

/**
if (!copy(CONTENTDIR . 'examples/core.jar',
	  EXAMPLESDIR.strtolower($subdir).'/media/core.jar')) {
  echo 'Could not copy core.jar to ' . $subdir . '.';
}
if (!copy(CONTENTDIR . 'examples/loading.gif',
	  EXAMPLESDIR.strtolower($subdir).'/media/loading.gif')) {
  echo 'Could not copy loading.gif to ' . $subdir . '.';
}
*/

/**
# --------------------------------- 3D


$categories = get_examples_list('examples_3D.xml');
$break_after = array('Transform', 'Lights');
$subdir = '3D';
$dir = CONTENTDIR.'examples/'.$subdir.'/';

$count = 0;
foreach ($categories as $cat => $array) {
    if ($dp = opendir($dir.$cat)) {
        while ($fp = readdir($dp)) {
            if (substr($fp, 0, 1) != '.') {
                $ex = new Example($fp, $subdir."/".$cat, $subdir);
                //$ex = new Example($fp, $cat);
                $ex->output_file($categories);
                $count++;
            }
        }
    }
}

$page = new Page('3D', '3D');
$page->subtemplate('template.examples-3d.html');

$html = "<div class=\"ref-col\">\n";
foreach ($categories as $cat => $array) {
    
    #$html .= "<h3><img src=\"images/".strtolower(removesymbols($cat)).".gif\" alt=\"$cat\" /></h3>\n<p>";
    $html .= "<p><br /><b>$cat</b><br /><br />";
    foreach ($array as $file => $name) {
        $thisfile = strtolower($file);
        $html .= "\t<a href=\"$thisfile\">$name</a><br />\n";
    }
    #echo '</p>';
    $html .= '</p>';
    
    if (in_array($cat, $break_after)) {
        $html .= "</div><div class=\"ref-col\">";
    }
}
$html .= "</div>";

$page->content($html);
writeFile('learning/'.strtolower($subdir).'/index.html', $page->out());
if (!copy(CONTENTDIR . 'examples/core.jar',
	  EXAMPLESDIR.strtolower($subdir).'/media/core.jar')) {
  echo 'Could not copy core.jar to ' . $subdir . '.';
}
if (!copy(CONTENTDIR . 'examples/loading.gif',
	  EXAMPLESDIR.strtolower($subdir).'/media/loading.gif')) {
  echo 'Could not copy loading.gif to ' . $subdir . '.';
}

*/


$benchmark_end = microtime_float();
$execution_time = round($benchmark_end - $benchmark_start, 4);

?>

<h2>Examples pages generation Successful</h2>
<p>Generated <?= $count+1 ?> files in <?=$execution_time?> seconds.</p>
<h2>Updated <?=$where?> </h2>


<?

function get_examples_list($exstr)
{
    $xml = openXML($exstr);
    $my_cats = array();
    foreach ($xml->childNodes as $c) {
        $name = htmlspecialchars($c->getAttribute('label'));
    
        if ($c->childCount > 0) {
            foreach ($c->childNodes as $s) {
                if ($s->nodeType == 1) {
                    $my_cats[$name][$s->getAttribute('file')] = trim($s->firstChild->nodeValue);
                }
            }
        }
    }
    return $my_cats;
}

function removesymbols($str)
{
    return preg_replace("/\W/", "", $str);
}

?>