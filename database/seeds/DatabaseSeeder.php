<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
            'Ambulatory',
            'Hypertension',
            'Oncology',
            'Endocrine',
            'Infectious',
            'Neurology',
            'Nutrition',
            'Rheumatology',
            'Allergy',
            'Chest',
            'Gastroenterology',
            'Hematology',
            'Nephrology',
            'Critical',
            'Genetics',
            'Cadiology',
            'Geriatric',
            'The Heart',
            'Ophthalmology',
            'OBGYN',
        ];
        foreach ($divisions as $division) {
            App\Division::create(['name' => $division]);
        }

        $divisionsCount = count($divisions);

        factory(App\Patient::class, 100)->create()->each(function ($patient) use ($divisionsCount) {
            $patient->update([
                'division_id' => random_int(1, $divisionsCount)
            ]);
            $patient->treatments()->saveMany(factory(App\Treatment::class, 10)->make());
        });
    }
}
