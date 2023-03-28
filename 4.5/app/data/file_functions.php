<?php

function getData()
{
    $fileName = CONFIG['data_file'];

    $json = '';

    if (!file_exists($fileName)) {
        file_put_contents($fileName, '');
    } else {
        $json = file_get_contents($fileName);
    }

    return $json;
}

function getTerms()
{
    $data = getData();

    return json_decode($data);
}

function getTerm($term) {
    $terms = getTerms();

    foreach ($terms as $value) {
        if ($value->term == $term) {
            return $value;
        }
    }

    return false;
}