<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
          if($key > 0 && $row[1] != ''){
            $user = \App\Models\User::firstOrCreate([
                      'nis' => $row[1]
                    ],[
                      'nama' => $row[2],
                      'jenis_kelamin' => $row[3],
                      'kelas' => $row[4],
                      'role' => $row[5],
                      'password' => bcrypt('rahasia')
                    ]);
            // Start Edit Here
            if($user->password == ''){
              $user->password = bcrypt('rahasia');
            }
            // End Edit Here
          }
        }
    }
}
