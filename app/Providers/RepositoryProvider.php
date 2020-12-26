<?php

namespace App\Providers;

use App\Models\Repository;

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
        // dump($nginxVhostsRoot);

        $vhosts = [];
        foreach ($nginxVhosts as $key => $vhost) {
            $domain = explode('.', $vhost);
            $keyToRemove = sizeof($domain) - 1;
            unset($domain[$keyToRemove]);
            $domain = implode('.', $domain);
            Repository::firstOrCreate([
                'name' => $domain,
                'vhost_link' => "http://$vhost",
                'vhost_path' => $nginxVhostsRoot[$key]
            ]);
        }
        $repositories = Repository::all();

        return $repositories;
    }
}
