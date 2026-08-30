<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED   );

require_once("includes/Parsedown.php");
require_once("includes/spyc.php");

// in dev are usually hosted in root but in live we will be in blog
$site_root = get_cfg_var('hyam_blog_root') ? get_cfg_var('hyam_blog_root') : '/blog2/';

/*

called with nothing render links to the last 10 posts
called with a year param then render the index for that year
called with a path then render the md file at that path

This is designed to work both as a php server internal router for dev and local serving
and also in conjunction with an .htaccess file and mod-rewrite rules in production

*/

// this is the landing page that parses all the other calls
$path = parse_url($_SERVER["REQUEST_URI"],  PHP_URL_PATH);

$path_parts = explode('/', $path);
array_shift($path_parts); // lose the first always blank one

if($path_parts[0] == 'blog2') array_shift($path_parts);

// rule for acting as a router script
if($path_parts[0] == 'scripts') return false;
if($path_parts[0] == 'style') return false;
if(preg_match('/\.jpg$/i', $path)) return false;
if(preg_match('/\.jpeg$/i', $path)) return false;
if(preg_match('/\.png$/i', $path)) return false;
if(preg_match('/\.gif$/i', $path)) return false;

$page_title = "Roger Hyam";
$display_date = '';
$display_next_prev = false;


$file_path = implode('/', $path_parts);

if(!$file_path || $file_path == 'index.php' && !@$_GET['year']) $file_path = 'home.md';

// are we rendering a markdown file
if(file_exists($file_path) && is_file($file_path) && preg_match('/\.md$/', $file_path)){

    if ($file_path != 'home.md') $display_next_prev = true; // we are on a page

    $fp = @fopen($file_path, "r");

    $yaml = '';
    $md = '';
    $in_frontmatter = false;
    if ($fp) {
        while ($line = fgets($fp)) {
            // toggle if we are in front matter or not
            if(trim($line) == '---'){
                $in_frontmatter = !$in_frontmatter;
                continue;
            } 
            if($in_frontmatter){
                $yaml .= $line;
            }else{
                $md .= $line;
            }
        }
        fclose($fp);
    }else{
        echo "Trouble reading: $file_path";
    }

    $parser = new Parsedown();
    $page_body = $parser->text($md);
    $page_metadata = spyc_load($yaml);

    // set the page title if we have one in the metadata
    if(isset($page_metadata['title'])) $page_title = $page_metadata['title'];

    // set a date if it is in the metadata
    if(isset($page_metadata['date'])){

        $date = new DateTime($page_metadata['date']);
        $display_date = '<p class="display-date">';
        $display_date .= $date->format('l jS F Y');
        $display_date .= "</p>";
    }
}else{
    $page_body = null;
    $page_metadata = null;
}

// are we rendering a year listing?
if(@$_GET['year']){

    $page_body = '';

    $year = $_GET['year'];
    $page_title = "Posts from {$year}";

    $splash_jpg = "posts/{$year}/splash.jpg";
    if(file_exists($splash_jpg)){
        $page_body .= "<img src=\"{$splash_jpg}\" alt=\"{$year} splash image.}\" />";
    }


    $page_body .= "<ul>";

    $files = glob('posts/' . $year . '/*.md');

    foreach($files as $file_path){
        $page_body .=  get_post_list_item($file_path);
    }

    $page_body .= "<ul>";

}

// if we are on the home page then as the latests posts
if($file_path == 'home.md'){
    $page_body .= '<h2>Latest Posts</h2>';

    $all  = glob('posts/*/*.md');
    rsort($all);
    $page_body .= "<ul>";
    $count = 0;
    foreach($all as $file_path){
        $page_body .= get_post_list_item($file_path);
        $count++;
        if($count > 20) break;
    }
    $page_body .= "<ul>";  
    
    //$page_body .= print_r($all, true);

}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo $site_root ?>style/main.css" rel="stylesheet">
    <title>Roger Hyam: <?php echo $page_title ?></title>
</head>
<body>
  
    <div id="banner">
          <a href="/">Roger Hyam: The Blog</a>
    </div>
    <div id="yearSelect">
        <a href="<?php echo $site_root ?>index.php">Home</a>
<?php
    $dirs = glob('posts/*', GLOB_ONLYDIR );
    rsort($dirs);;
    foreach ($dirs as $dir){
        $year = pathinfo($dir, PATHINFO_FILENAME);
        echo " | <a href=\"{$site_root}index.php?year={$year}\">$year</a>";
    }
?>
    </div>

    <main>
    <?php echo $display_date; ?>
    <h1><?php echo $page_title ?></h1>
    <?php echo $page_body; ?>

    <div id="nextPrev" >
<?php

    if($display_next_prev){

        $files = glob('posts/*/*.md');
        rsort($files);

        $prev = null;
        $next = null;
        for ($i=0; $i < count($files); $i++) { 
            if($files[$i] == $file_path){
                if($i > 0) $prev = $files[$i -1];
                if($i < count($files) -1) $next = $files[$i +1];
            }
        }

        if($prev){
            $metadata = get_md_metadata($prev);
            echo "<a href=\"{$site_root}{$prev}\" style=\"float:left;\">&lt; {$metadata['title']}</a>";
        }  
        if($next){
            $metadata = get_md_metadata($next);
            echo "<a href=\"{$site_root}{$next}\"  style=\"float:right; margin-left: 2em;\">{$metadata['title']} &gt;</a>";
        }

    }
?>
    </div>

    </main>

    <script src="/scripts/main.js"></script>
</body>

</html>

<?php

    function get_post_list_item($file_path){

        global $site_root;

        $out = '<li>';

        $metadata = get_md_metadata($file_path);
        if(isset($metadata['date'])) $out .= "{$metadata['date']} ";

        if(isset($metadata['title'])) $out .= "<a href=\"{$site_root}{$file_path}\">{$metadata['title']}</a>";

        $out .= '</li>';

        return $out;
    }

    function get_md_metadata($file_path){
        $fp = @fopen($file_path, "r");
        $yaml = '';
        $metadata = array();

        // first line must be ---
        $line = fgets($fp);
        if(trim($line) != '---') return $metadata;

        if ($fp) {
            while ($line = fgets($fp)) {
                // toggle if we are in front matter or not
                if(trim($line) == '---') break;
                else $yaml .= $line;
            }
            fclose($fp);
        }else{
            echo "Trouble reading: $file_path";
        }

        $metadata = spyc_load($yaml);
        return $metadata;
    }

?>