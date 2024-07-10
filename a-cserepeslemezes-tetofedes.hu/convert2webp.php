<?php
function convertToWebP($inputImagePath, $outputImagePath) {
    $inputImageInfo = pathinfo($inputImagePath);
    $outputImageInfo = pathinfo($outputImagePath);
    
    $inputImageExtension = strtolower($inputImageInfo['extension']);
    $outputImageExtension = strtolower($outputImageInfo['extension']);
    
    if ($inputImageExtension === 'webp' || $outputImageExtension !== 'webp') {
        // Ha az input kép már WebP, vagy az output kép nem WebP, akkor hagyjuk az eredeti képet, és kilépünk.
        return false;
    }
    
    // Kép betöltése a megadott útvonalról
    switch ($inputImageExtension) {
        case 'jpg':
        case 'jpeg':
            $image = imagecreatefromjpeg($inputImagePath);
            break;
        case 'png':
            $image = imagecreatefrompng($inputImagePath);
            break;
        case 'gif':
            $image = imagecreatefromgif($inputImagePath);
            break;
        // További képformátumok kezelése esetén bővíthető
        default:
            return false; // Nem támogatott képformátum
    }
    
    // Kép konvertálása WebP formátumba
    imagewebp($image, $outputImagePath);
    
    // Memóriafelszabadítás és képforrások lezárása
    imagedestroy($image);
    
    return true; // Sikeres konvertálás
}

// Adott mappa útvonala, ahol a képek találhatók
$inputDirectory = 'images/';

// Ellenőrizzük, hogy a megadott mappa létezik és olvasható-e
if (is_dir($inputDirectory) && is_readable($inputDirectory)) {
    // Ellenőrizzük, hogy a GD könyvtár telepítve van-e
    if (extension_loaded('gd')) {
        // Végigmegyünk az összes fájlon a mappában
        $files = glob($inputDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        foreach ($files as $file) {
            // Az új fájlnév a WebP kiterjesztéssel
            $outputFile = pathinfo($file, PATHINFO_FILENAME) . '.webp';
            // Teljes útvonal a bemeneti és kimeneti fájlokhoz
            $inputImagePath = $file;
            $outputImagePath = $inputDirectory . $outputFile;
            // Konvertálás és eredmény kiírása
            if (convertToWebP($inputImagePath, $outputImagePath)) {
                echo "A(z) {$file} kép sikeresen konvertálva lett WebP formátumba." . PHP_EOL;
            } else {
                echo "A(z) {$file} kép konvertálása nem sikerült vagy már WebP formátumú." . PHP_EOL;
            }
        }
    } else {
        echo "Hiba: A GD könyvtár nincs telepítve!"; // GD könyvtár ellenőrzése
    }
} else {
    echo "Hiba: A megadott mappa nem létezik vagy nem olvasható!"; // Mappa ellenőrzése
}
?>