<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url_province = "https://api.rajaongkir.com/starter/province?key=699d787894188b6dabf2efd9ba9a81d3";
        
        $json_str = file_get_contents($url_province);
        
        $json_obj = json_decode($json_str);
        
        $provinces = [];
        
        foreach($json_obj->rajaongkir->results as $province){
            $provinces[] = [
                'id' => $province->province_id,
                'province' => $province->province
            ];
        }
        
        \DB::table('provinces')->insert($provinces);
    
    }
}
