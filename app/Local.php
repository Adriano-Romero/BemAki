<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;
use Phaza\LaravelPostgis\Geometries\Point;


class Local extends Model
{
    use PostgisTrait;

    protected $fillable = [
        'nome',
        'address',
        'tipo'
    ];

    protected $postgisFields = [
        'location',
        'polygon',
    ];
}
