<?php

namespace App\Library;

use App\Doctor;
use Faker\Provider\ka_GE\DateTime;

class MyFunctions
{
    public static function importcsvToDB($filePath, $model)
    {
        $fileD = fopen($filePath, "r");
        // $column=fgetcsv($fileD);
        while (!feof($fileD)) {
            $rowData[] = fgetcsv($fileD);
        }
        foreach ($rowData as $key => $value) {

            $inserted_data = array(
                'name' => $value[0],
            );
            $model::create($inserted_data);
        }
        print_r($rowData);
    }

    public static function upload_img($filename)
    {
        $client_id = "70f2dbafd2fd559";
        $handle = fopen($filename, "r");
        $data = fread($handle, filesize($filename));
        $pvars = array("image" => base64_encode($data));
        $timeout = 30;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, "https://api.imgur.com/3/image.json");
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Client-ID " . $client_id));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
        $out = curl_exec($curl);
        curl_close($curl);
        $pms = json_decode($out, true);
        $url = $pms["data"]["link"];
        return $url;
    }
    public static function updateRating($star, $like, $doctor_id)
    {
        $doctor = Doctor::findOrFail($doctor_id);
        if ($doctor) {
            $doctor->rating = ($doctor->rating + $star) / 2;
            $doctor->likes += $like == null ? 0 : $like;
            $doctor->save();
        } else return response()->json(['status_code' => 401]);
    }

    public static function countAge($birthDate)
    {
        return date_diff(date_create($birthDate), date_create('now'))->y;
    }
}
