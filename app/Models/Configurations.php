<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Configurations extends Model
{
    use HasFactory;

    public function Get()
    {
        $All = [];
        $Groups = $this->Groups();
        foreach ($Groups as $GroupKey => $Group) {
            $Configurations =  DB::table('configurations')
                        ->where('configuration_group_id',  $Group->group_id)
                        ->get();
            $DataConfiguration = [];
            foreach ($Configurations as $key => $Configuration) {
                $DataConfiguration[$key]['id'] = $Configuration->configuration_id;
                $DataConfiguration[$key]['name'] = $Configuration->configuration_name;
                $DataConfiguration[$key]['value'] = $Configuration->configuration_value;
                $DataConfiguration[$key]['defualt'] = $Configuration->configuration_default;
            }
            $All[$GroupKey] = [
                "GroupId" =>  $Group->group_id,
                "GroupName" => $Group->group_name,
                "Configurations" => $DataConfiguration
            ];
        }   
        return $All;
    }

    public function Set($Data)
    {
        DB::table('configurations')
            ->where('configuration_id', $Data['configuration_id'])
            ->update(['configuration_value' => $Data['configuration_value']]);
    }

    public function Groups()
    {
        $Groups =  DB::table('configuration_group')
                        ->get();
        return $Groups;
    }
}
