<?php

namespace App\Providers;

use App\Models\Repository;
use DirectoryIterator;

class RepositoryProvider
{
    public static function getRepositories()
    {
        $nginxVhosts = shell_exec('grep server_name /etc/nginx/sites-enabled/* -RiI');
        $nginxVhosts = explode(PHP_EOL, $nginxVhosts);

        foreach ($nginxVhosts as $key => $vhost) {
            // remove default nginx server_name
            if (strpos($vhost, 'server_name _') || strpos($vhost, 'example.com')) {
                unset($nginxVhosts[$key]);
            } else {
                // remove empty string
                if (!strpos($vhost, 'server_name')) {
                    unset($nginxVhosts[$key]);
                } else {
                    // keep only server_name
                    // remove useless part into string
                    $server = explode(' ', $vhost);
                    $server = str_replace(';', '', $server);
                    $nginxVhosts[$key] = $server[sizeof($server) - 1];
                }
            }
        }
        $nginxVhosts = array_values($nginxVhosts);

        $nginxVhostsRoot = shell_exec('grep root /etc/nginx/sites-enabled/* -RiI');
        $nginxVhostsRoot = explode(PHP_EOL, $nginxVhostsRoot);

        foreach ($nginxVhostsRoot as $key => $vhost) {
            // remove default nginx server_name
            if (strpos($vhost, 'nginx/sites-enabled/default')) {
                unset($nginxVhostsRoot[$key]);
            } else {
                // remove empty string
                if (!strpos($vhost, 'nginx/sites-enabled')) {
                    unset($nginxVhostsRoot[$key]);
                } else {
                    // keep only server_name
                    // remove useless part into string
                    $server = explode(' ', $vhost);
                    $server = str_replace(';', '', $server);
                    $nginxVhostsRoot[$key] = $server[sizeof($server) - 1];
                }
            }
        }
        $nginxVhostsRoot = array_values($nginxVhostsRoot);

        foreach ($nginxVhosts as $key => $vhost) {
            $domain = explode('.', $vhost);
            $keyToRemove = sizeof($domain) - 1;
            unset($domain[$keyToRemove]);
            $domain = implode('.', $domain);

            $vhost_path = $nginxVhostsRoot[$key];
            // get .git info
            $dir_path = $vhost_path;
            // from 'public', 'dist' dir nav to parent to find .git dir
            $dir_path = "$dir_path/..";
            // get data from .git config
            $gitInfo = file_get_contents("$dir_path/.git/config");
            $gitInfo = explode(PHP_EOL, $gitInfo);
            // extract useful data
            $gitData = [];
            foreach ($gitInfo as $key => $info) {
                if (strpos($info, 'url = ')) {
                    // for clone
                    $repoUrl = explode('url = ', $info);
                    $clone = $repoUrl[sizeof($repoUrl) - 1];
                    // for url
                    $url = $clone;
                    $url = str_replace('git@', '', $clone);
                    $url = str_replace('.git', '', $url);
                    $url = str_replace(':', '/', $url);

                    $gitData['clone'] = $clone;
                    $gitData['url'] = "http://$url";
                }
                if (strpos($info, 'merge = refs/heads/')) {
                    $gitBranch = explode('merge = ', $info);
                    $gitData['branch'] = str_replace('refs/heads/', '', $gitBranch[sizeof($gitBranch) - 1]);
                }
            }
            $author = $gitData['clone'];
            $author = explode('/', $author);
            $name = str_replace('.git', '', $author[sizeof($author) - 1]);
            $author = explode(':', $author[0]);
            $author = $author[sizeof($author) - 1];

            Repository::firstOrCreate([
                'name' => strtolower($name),
                'vhost_link' => "http://$vhost",
                'vhost_path' => $vhost_path,
                'author' => strtolower($author),
                'url' => $gitData['url'],
                'clone' => $gitData['clone'],
                'branch' => $gitData['branch'],
            ]);
        }
        $repositories = Repository::all();

        return $repositories;
    }
}
