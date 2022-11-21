<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\category;

use Maatwebsite\Excel\Concerns\ToCollection;

class PlayerImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        for($i=1;$i < count($rows);$i++){
        $category= new category();
        $category->playername=$rows[$i][0];
        $category->email=$rows[$i][1];
        $category->image=$rows[$i][2];
        $category->save();
    }
}
}
