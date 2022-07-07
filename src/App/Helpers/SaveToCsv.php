<?php
namespace Console\App\Helpers;

class SaveToCsv
{

    public static function save($data, $fileName){


         $f = fopen($fileName, 'w');
         // Check if we were able to open the file.
         if ($f) {
             fputcsv($f, ['Period', 'Basic Payment', 'Bonus Payment']);
             foreach ($data as $pay_date) {
                 fputcsv($f,$pay_date);
             }
             fclose($f);
         } else {
             throw new \RuntimeException("Something Went Wrong!."); // TODO: improve it
         }


    }

}