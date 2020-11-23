<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\ConfigurationGroups;
use Illuminate\Support\Str;


class Configurations extends Model
{
    use HasFactory;
    public $ConfigurationsTable = "configurations";

    public function by_groups()
    {
        $All = [];
        $Groups = ConfigurationGroups::all();
        foreach ($Groups as $GroupKey => $Group) {
            $Configurations =  DB::table($this->ConfigurationsTable)
                        ->where('group_id',  $Group->id)
                        ->get();
            $DataConfiguration = [];
            foreach ($Configurations as $key => $Configuration) {
                $DataConfiguration[$key]['id'] = $Configuration->id;
                $DataConfiguration[$key]['name'] = $Configuration->name;
                $DataConfiguration[$key]['value'] = $Configuration->value;
                $DataConfiguration[$key]['defualt'] = $Configuration->default;
            }
            $All[$GroupKey] = [
                "GroupId" =>  $Group->id,
                "GroupName" => $Group->name,
                "Configurations" => $DataConfiguration
            ];
        }   
        return $All;
    }

    public function by_group($GroupId)
    {
        return DB::table($this->ConfigurationsTable)
                ->where('group_id', $GroupId)
                ->get();
    }

    public function get_configurations($GroupId)
    {
        $Return = [];
        $Data = DB::table($this->ConfigurationsTable)
                ->where('group_id', $GroupId)
                ->get();

        foreach ($Data as $key => $value) {
            $Name = Str::of(Str::lower($value->name))->replace(' ', '-');
        }

        return $Return;
    }

    public function Set($Data)
    {
        DB::table($this->ConfigurationsTable)
            ->where('id', $Data['id'])
            ->update(['value' => $Data['value']]);
    }
}
