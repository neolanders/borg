#!/usr/bin/php
<?php
include("/home/websites/browserplus/php/site.php");
include("/home/websites/browserplus/php/db.php");
include("/home/websites/browserplus/php/git.php");

// DOK_BASE - normally set in apache, but not available to scripts
putenv("DOK_BASE=/home/websites/browserplus/data");


$gitbase = "http://github.com/";

$db = new DB("git");
$git = new GIT();

// Fetch issues
$secret = $git->get_cache_secret();

$host = ((get_cfg_var('bp_env') == "local") ? "borg" : "browserplus.org");
fetch("http://$host/site/cache_git.php?s=$secret");


// Fetch commits

// projects stored in data/projects/projects.json file
$all_projects = get_projects();
foreach($all_projects as $label=>$projects) {
    foreach($projects as $purl) {

        // only process urls hosted on github (see gitbase above)
        if (substr($purl, 0, strlen($gitbase)) == $gitbase) {
            // project is "lloyd/bp-imagealter"
            $np = explode("/", substr($purl, strlen($gitbase)));
            $user = $np[0];
            $repository = $np[1];

            // fetch commit data
            $commit_url = "http://github.com/api/v1/json/{$user}/{$repository}/commit/master";

            $json = fetch($commit_url);

            if ($json) {
            
                // commit data is a json struct
                $data = json_decode($json, 1);
                $git = $data["commit"];

                // get date as integer
                $project = "{$user}/{$repository}";
                $date = strtotime($git["committed_date"]);
                $msg = $git["message"];
                $url = $git["url"];

                print "updating $project\n";
		        $db->execute("INSERT INTO gitcommit VALUES(?,?,?,?) ON DUPLICATE KEY UPDATE tcommit=?,url=?,msg=? ",
                    // TBL gitcommit(project, tcommit, url, msg)
		            array($project, $date, $url, $msg, $date, $url, $msg));
            }
        }
    }
}

?>