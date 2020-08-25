<?php

function retrieve_from_cache($query){
    #retries stored value from cache, returns value or false
    $memcache = new Memcached();
    $memcache->addServer('127.0.0.1', 11211) or die("Could not connect");
    $json = $memcache->get($query); #returns false if no data
    return $json;
}

function store_in_cache($query, $data, $minutes){
    #insert value into cache,
    #query - unique value to cache by
    #data - the data to store in cache
    #minutes - the time to store in cache
    $memcache = new Memcached();
    $memcache->addServer('127.0.0.1', 11211) or die("Could not connect");
    $memcache->set($query, $data, time()+60*$minutes);
    return True;
}
?>