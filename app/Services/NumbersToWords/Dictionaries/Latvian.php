<?php

namespace App\Services\NumbersToWords\Dictionaries;

class Latvian
{
    public const ZERO = 'nulle';

    public const UNITS = [
        0 => '',
        1 => 'viens',
        2 => 'divi',
        3 => 'trīs',
        4 => 'četri',
        5 => 'pieci',
        6 => 'seši',
        7 => 'septiņi',
        8 => 'astoņi',
        9 => 'deviņi',
        10 => 'desmit',
        11 => 'vienpadsmit',
        12 => 'divpadsmit',
        13 => 'trīspadsmit',
        14 => 'četrpadsmit',
        15 => 'piecpadsmit',
        16 => 'sešpadsmit',
        17 => 'septiņpadsmit',
        18 => 'astoņpadsmit',
        19 => 'deviņpadsmit',
    ];

    public const TENS = [
        1 => 'desmit',
        2 => 'divdesmit',
        3 => 'trīsdesmit',
        4 => 'četrdesmit',
        5 => 'piecdesmit',
        6 => 'sešdesmit',
        7 => 'septiņdesmit',
        8 => 'astoņdesmit',
        9 => 'deviņdesmit',
    ];

    public const HUNDREDS = [
        1 => 'simt',
        2 => 'divsimt',
        3 => 'trīssimt',
        4 => 'četrsimt',
        5 => 'piecsimt',
        6 => 'sešsimt',
        7 => 'septiņsimt',
        8 => 'astoņsimt',
        9 => 'deviņsimt',
    ];

    public const THOUSANDS = [
        1 => 'tūkstoš',
        2 => 'divtūkstoš',
        3 => 'trīstūkstoš',
        4 => 'četrtūkstoš',
        5 => 'piectūkstoš',
        6 => 'seštūkstoš',
        7 => 'septiņtūkstoš',
        8 => 'astoņtūkstoš',
        9 => 'deviņtūkstoš',
    ];

    public const THOUSANDS_FINAL = [
        1 => 'tūkstotis',
        2 => 'divi tūkstoši',
        3 => 'trīs tūkstoši',
        4 => 'četri tūkstoši',
        5 => 'pieci tūkstoši',
        6 => 'seši tūkstoši',
        7 => 'septiņi tūkstoši',
        8 => 'astoņi tūkstoši',
        9 => 'deviņi tūkstoši',
    ];
}
