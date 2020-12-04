<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use File;
use ZipArchive;

class ZipController extends Controller {

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */

    public function createZip( Request $request,$folderName ) {
       
        $public_dir = public_path();
        $pathInfo = ['dirname'=>$public_dir,'basename'=>'business-contacts'];
        $parentPath = $pathInfo['dirname'];
        $dirName = $pathInfo['basename'];
        $outZipPath = $public_dir.'/ZipFiles/ABCD.zip';
        $sourcePath =  $public_dir.'/business-contacts';
    
        $z = new ZipArchive;
        $z->open($outZipPath, ZIPARCHIVE::CREATE);
        $z->addEmptyDir($dirName);
        self::folderToZip($sourcePath, $z, strlen("$parentPath/"));
        // prd($z);
        $z->close();


        // return redirect( 'user-dashboard' );
    }

    private static function folderToZip($folder, &$zipFile, $exclusiveLength) {
        $handle = opendir($folder);
        while (false !== $f = readdir($handle)) {
          if ($f != '.' && $f != '..') {
            $filePath = "$folder/$f";
            // Remove prefix from file path before add to zip.
            $localPath = substr($filePath, $exclusiveLength);
            if (is_file($filePath)) {
              $zipFile->addFile($filePath, $localPath);
            } elseif (is_dir($filePath)) {
              // Add sub-directory.
              $zipFile->addEmptyDir($localPath);
              self::folderToZip($filePath, $zipFile, $exclusiveLength);
            }
          }
        }
        closedir($handle);
      }



    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function downloadZip(Request $request,$fileName) {
        $zip = new ZipArchive;
        $fileName = "ZipFiles/$fileName.zip";
        // prd(public_path( $fileName ));
        return response()->download( public_path( $fileName ) );
    }
}