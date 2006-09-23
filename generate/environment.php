<?

require('../config.php');
require('lib/Translation.class.php');
$benchmark_start = microtime_float();

// arguments
$lang = isSet($_POST['lang']) ? $_POST['lang'] : 'en';

// get translation file
$translation = new Translation($lang);

// make troubleshooting page
$source = CONTENTDIR."/api_$lang/troubleshooting/";
$path = REFERENCEDIR . ($lang == 'en' ? '' : "/$lang") . "/troubleshooting/";
make_necessary_directories($path."images/file");
$page = new Page("Troubleshooting", "Troubleshooting", "Troubleshooting");
$page->content(file_get_contents($source."index.html"));
$page->language($lang);
writeFile('reference/'.($lang=='en'?'':"$lang/").'troubleshooting/index.html', $page->out());
copydirr($source.'/images', $path.'/images');

// make overview page
$source = CONTENTDIR."/api_$lang/environment/";
$path = REFERENCEDIR . ($lang == 'en' ? '' : "/$lang") . "/environment/";
make_necessary_directories($path."images/file");
$page = new Page("Environment (IDE)", "Environment", "Environment");
$page->content(file_get_contents($source."index.html"));
$page->language($lang);
writeFile('reference/'.($lang=='en'?'':"$lang/").'environment/index.html', $page->out());
copydirr($source.'/images', $path.'/images');

// make export page
$page = new Page("Environment (IDE)", "Environment", "Environment");
$page->content(file_get_contents($source."export.html"));
$page->language($lang);
writeFile('reference/'.($lang=='en'?'':"$lang/").'environment/export.html', $page->out());

// make platforms page
$page = new Page("Environment (IDE)", "Environment", "Environment");
$page->content(file_get_contents($source."platforms.html"));
$page->language($lang);
writeFile('reference/'.($lang=='en'?'':"$lang/").'platforms/export.html', $page->out());


$benchmark_end = microtime_float();
$execution_time = round($benchmark_end - $benchmark_start, 4);

?>

<h2>Environment page generation Successful</h2>
<p>Generated files in <?=$execution_time?> seconds.</p>