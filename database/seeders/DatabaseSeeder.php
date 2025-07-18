<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\Pilot;
use App\Models\Gundam;
use App\Models\GruntSuit;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Organizations
        $organizations = [
            'Advanced European Union',
            'A-Laws',
            'Celestial Beings',
            'Innovators',
            'Team Trinity',
            'Union of Solar Energy and Free Nations',
            'United Nation Forces',
        ];

        $orgMap = [];
        foreach ($organizations as $name) {
            $orgMap[$name] = Organization::create(['name' => $name]);
        }

        // Pilots
        $pilots = [
            ['name' => 'Alejandro Corner', 'rank' => 'Commander'],
            ['name' => 'Allelujah Haptism', 'rank' => 'Gundam Meister'],
            ['name' => 'Anew Returner', 'rank' => 'Innovator Agent'],
            ['name' => 'Bring Stabity', 'rank' => 'A-Laws Commander'],
            ['name' => 'Daiki Miyaga', 'rank' => 'Lieutenant'],
            ['name' => 'Johann Trinity', 'rank' => 'Team Leader'],
            ['name' => 'Lockon Stratos (Lyle Dylandy)', 'rank' => 'Gundam Meister'],
            ['name' => 'Lockon Stratos (Neil Dylandy)', 'rank' => 'Gundam Meister'],
            ['name' => 'Michael Trinity', 'rank' => 'Mercenary'],
            ['name' => 'Nena Trinity', 'rank' => 'Mercenary'],
            ['name' => 'Patrick Colasour', 'rank' => 'Captain'],
            ['name' => 'Setsuna F. Seiei', 'rank' => 'Gundam Meister'],
            ['name' => 'Tieria Erde', 'rank' => 'Gundam Meister'],
            ['name' => 'Ali Al-Saachez', 'rank' => 'Mercenary'],
            ['name' => 'Graham Aker', 'rank' => 'Captain'],
        ];

        $pilotMap = [];
        foreach ($pilots as $pilot) {
            $p = Pilot::create($pilot);
            $pilotMap[$pilot['name']] = $p;
        }

        // Gundams
        $gundams = [
            [
                'name' => 'Arche Gundam',
                'pilots' => ['Ali Al-Saachez'],
                'org' => 'Innovators',
                'image' => 'gundams/Arche_Gundam.jpg'
            ],
            [
                'name' => 'Gundam Throne Eins',
                'pilots' => ['Johann Trinity'],
                'org' => 'Team Trinity',
                'image' => 'gundams/Gundam_Throne_Eins.jpg'
            ],
            [
                'name' => 'Gundam Dynames',
                'pilots' => ['Lockon Stratos (Neil Dylandy)'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Dynames.jpg'
            ],
            [
                'name' => 'Cherudim Gundam',
                'pilots' => ['Lockon Stratos (Lyle Dylandy)'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Cherudim_Gundam.jpg'
            ],
            [
                'name' => 'Gundam Kyrios',
                'pilots' => ['Allelujah Haptism'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Kyrios.jpg'
            ],
            [
                'name' => 'Gundam Virtue',
                'pilots' => ['Tieria Erde'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Virtue.jpg'
            ],
            [
                'name' => 'Gundam Exia',
                'pilots' => ['Setsuna F. Seiei'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Exia.jpg'
            ],
            [
                'name' => 'Gundam Throne Zwei',
                'pilots' => ['Michael Trinity'],
                'org' => 'Team Trinity',
                'image' => 'gundams/Gundam_Throne_Zwei.jpg'
            ],
            [
                'name' => 'Gundam Throne Drei',
                'pilots' => ['Nena Trinity'],
                'org' => 'Team Trinity',
                'image' => 'gundams/Gundam_Throne_Drei.jpg'
            ],
            [
                'name' => '00 Gundam',
                'pilots' => ['Setsuna F. Seiei'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/00_Gundam.jpg'
            ],
            [
                'name' => '00 Raiser',
                'pilots' => ['Setsuna F. Seiei'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/00_Raiser.jpg'
            ],
            [
                'name' => 'Seravee Gundam',
                'pilots' => ['Tieria Erde'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Seravee_Gundam.jpg'
            ],
            [
                'name' => 'Arios Gundam',
                'pilots' => ['Allelujah Haptism'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Arios_Gundam.jpg'
            ],
            [
                'name' => 'Gundam Nadleeh',
                'pilots' => ['Tieria Erde'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Nadleeh.jpg'
            ],
            [
                'name' => 'Cherudim Gundam GNHW/R',
                'pilots' => ['Lockon Stratos (Lyle Dylandy)'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Cherudim_Gundam_GNHW_R.jpg'
            ],
            [
                'name' => 'Cherudim Gundam SAGA',
                'pilots' => ['Lockon Stratos (Lyle Dylandy)'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Cherudim_Gundam_SAGA.jpg'
            ],
            [
                'name' => 'Gundam Dynames Repair',
                'pilots' => ['Lockon Stratos (Lyle Dylandy)'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Dynames_Repair.jpg'
            ],
            [
                'name' => 'Gundam Zabanya',
                'pilots' => ['Lockon Stratos (Lyle Dylandy)'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Zabanya.jpg'
            ],
            [
                'name' => '00 Gundam Seven Sword',
                'pilots' => ['Setsuna F. Seiei'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/00_Gundam_Seven_Sword.jpg'
            ],
            [
                'name' => 'Gundam 00 Qan[T]',
                'pilots' => ['Setsuna F. Seiei'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_00_Qan_T.jpg'
            ],
            [
                'name' => 'Gundam Avalanche Exia',
                'pilots' => ['Setsuna F. Seiei'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Avalanche_Exia.jpg'
            ],
            [
                'name' => 'Raphael Gundam',
                'pilots' => ['Tieria Erde'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Raphael_Gundam.jpg'
            ],
            [
                'name' => 'Seraphim Gundam',
                'pilots' => ['Tieria Erde'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Seraphim_Gundam.jpg'
            ],
            [
                'name' => 'Seravee Gundam GNHW-B',
                'pilots' => ['Tieria Erde'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Seravee_Gundam_GNHW_B.jpg'
            ],
            [
                'name' => 'Arios Gundam GNHW/M',
                'pilots' => ['Allelujah Haptism'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Arios_Gundam_GNHW_M.jpg'
            ],
            [
                'name' => 'Gundam Harute',
                'pilots' => ['Allelujah Haptism'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Harute.jpg'
            ],
            [
                'name' => 'Gundam Kyrios Gust',
                'pilots' => ['Allelujah Haptism'],
                'org' => 'Celestial Beings',
                'image' => 'gundams/Gundam_Kyrios_Gust.jpg'
            ],
        ];

        foreach ($gundams as $g) {
            $gundam = Gundam::create([
                'name' => $g['name'],
                'description' => 'Mobile Suit from Gundam 00 series',
                'image' => $g['image'],
                'organization_id' => $orgMap[$g['org']]->id
            ]);

            foreach ($g['pilots'] as $pilotName) {
                $gundam->pilots()->attach($pilotMap[$pilotName]->id);
            }
        }

        // Grunt Suits
        $gruntSuits = [
            [
                'name' => 'AEU Enact',
                'pilots' => ['Patrick Colasour'],
                'org' => 'Advanced European Union',
                'image' => 'grunts/AEU_Enact.jpg'
            ],
            [
                'name' => 'GN-X',
                'pilots' => ['Alejandro Corner'],
                'org' => 'United Nation Forces',
                'image' => 'grunts/GN-X.jpg'
            ],
            [
                'name' => 'AEU Hellion',
                'pilots' => ['Bring Stabity'],
                'org' => 'Advanced European Union',
                'image' => 'grunts/AEU_Hellion.jpg'
            ],
            [
                'name' => 'Union Flag',
                'pilots' => ['Graham Aker'],
                'org' => 'Union of Solar Energy and Free Nations',
                'image' => 'grunts/Union_Flag.jpg'
            ],
            [
                'name' => 'Gaddess',
                'pilots' => ['Anew Returner'],
                'org' => 'A-Laws',
                'image' => 'grunts/Gaddess.jpg'
            ],
            [
                'name' => 'Garazzo',
                'pilots' => ['Daiki Miyaga'],
                'org' => 'A-Laws',
                'image' => 'grunts/Garazzo.jpg'
            ],
            [
                'name' => 'GN-XIII',
                'pilots' => ['Alejandro Corner'],
                'org' => 'United Nation Forces',
                'image' => 'grunts/GN-XIII.jpg'
            ],
            [
                'name' => 'Advanced GN-X',
                'pilots' => ['Anew Returner'],
                'org' => 'United Nation Forces',
                'image' => 'grunts/Advanced_GN-X.jpg'
            ],
            [
                'name' => 'AEU Enact Commander Type',
                'pilots' => ['Patrick Colasour'],
                'org' => 'Advanced European Union',
                'image' => 'grunts/AEU_Enact_Commander_Type.jpg'
            ],
            [
                'name' => 'GN-XII Sword',
                'pilots' => ['Bring Stabity'],
                'org' => 'United Nation Forces',
                'image' => 'grunts/GN-XII_Sword.jpg'
            ],
        ];

        foreach ($gruntSuits as $gs) {
            $grunt = GruntSuit::create([
                'name' => $gs['name'],
                'description' => 'Standard military mobile suit',
                'image' => $gs['image'],
                'organization_id' => $orgMap[$gs['org']]->id
            ]);

            foreach ($gs['pilots'] as $pilotName) {
                $grunt->pilots()->attach($pilotMap[$pilotName]->id);
            }
        }
    }
}
