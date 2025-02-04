<?php

namespace Database\Seeders;

use App\Models\Government;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cairoCities = [
            ['15 مايو', '15 May'],
            ['الازبكية', 'Al Azbakeyah'],
            ['البساتين', 'Al Basatin'],
            ['التبين', 'Tebin'],
            ['الخليفة', 'El-Khalifa'],
            ['الدراسة', 'El darrasa'],
            ['الدرب الاحمر', 'Aldarb Alahmar'],
            ['الزاوية الحمراء', 'Zawya al-Hamra'],
            ['الزيتون', 'El-Zaytoun'],
            ['الساحل', 'Sahel'],
            ['السلام', 'El Salam'],
            ['السيدة زينب', 'Sayeda Zeinab'],
            ['الشرابية', 'El Sharabeya'],
            ['مدينة الشروق', 'Shorouk'],
            ['الظاهر', 'El Daher'],
            ['العتبة', 'Ataba'],
            ['القاهرة الجديدة', 'New Cairo'],
            ['المرج', 'El Marg'],
            ['عزبة النخل', 'Ezbet el Nakhl'],
            ['المطرية', 'Matareya'],
            ['المعادى', 'Maadi'],
            ['المعصرة', 'Maasara'],
            ['المقطم', 'Mokattam'],
            ['المنيل', 'Manyal'],
            ['الموسكى', 'Mosky'],
            ['النزهة', 'Nozha'],
            ['الوايلى', 'Waily'],
            ['باب الشعرية', 'Bab al-Shereia'],
            ['بولاق', 'Bolaq'],
            ['جاردن سيتى', 'Garden City'],
            ['حدائق القبة', 'Hadayek El-Kobba'],
            ['حلوان', 'Helwan'],
            ['دار السلام', 'Dar Al Salam'],
            ['شبرا', 'Shubra'],
            ['طره', 'Tura'],
            ['عابدين', 'Abdeen'],
            ['عباسية', 'Abaseya'],
            ['عين شمس', 'Ain Shams'],
            ['مدينة نصر', 'Nasr City'],
            ['مصر الجديدة', 'New Heliopolis'],
            ['مصر القديمة', 'Masr Al Qadima'],
            ['منشية ناصر', 'Mansheya Nasir'],
            ['مدينة بدر', 'Badr City'],
            ['مدينة العبور', 'Obour City'],
            ['وسط البلد', 'Cairo Downtown'],
            ['الزمالك', 'Zamalek'],
            ['قصر النيل', 'Kasr El Nile'],
            ['الرحاب', 'Rehab'],
            ['القطامية', 'Katameya'],
            ['مدينتي', 'Madinty'],
            ['روض الفرج', 'Rod Alfarag'],
            ['شيراتون', 'Sheraton'],
            ['الجمالية', 'El-Gamaleya'],
            ['العاشر من رمضان', '10th of Ramadan City'],
            ['الحلمية', 'Helmeyat Alzaytoun'],
            ['النزهة الجديدة', 'New Nozha'],
            ['العاصمة الإدارية', 'Capital New']
        ];

        $gizaCities = [
            ['الجيزة', 'Giza'],
            ['السادس من أكتوبر', 'Sixth of October'],
            ['الشيخ زايد', 'Cheikh Zayed'],
            ['الحوامدية', 'Hawamdiyah'],
            ['البدرشين', 'Al Badrasheen'],
            ['الصف', 'Saf'],
            ['أطفيح', 'Atfih'],
            ['العياط', 'Al Ayat'],
            ['الباويطي', 'Al-Bawaiti'],
            ['منشأة القناطر', 'ManshiyetAl Qanater'],
            ['أوسيم', 'Oaseem'],
            ['كرداسة', 'Kerdasa'],
            ['أبو النمرس', 'Abu Nomros'],
            ['كفر غطاطي', 'Kafr Ghati'],
            ['منشأة البكاري', 'Manshiyet Al Bakari'],
            ['الدقى', 'Dokki'],
            ['العجوزة', 'Agouza'],
            ['الهرم', 'Haram'],
            ['الوراق', 'Warraq'],
            ['امبابة', 'Imbaba'],
            ['بولاق الدكرور', 'Boulaq Dakrour'],
            ['الواحات البحرية', 'Al Wahat Al Baharia'],
            ['العمرانية', 'Omraneya'],
            ['المنيب', 'Moneeb'],
            ['بين السرايات', 'Bin Alsarayat'],
            ['الكيت كات', 'Kit Kat'],
            ['المهندسين', 'Mohandessin'],
            ['فيصل', 'Faisal'],
            ['أبو رواش', 'Abu Rawash'],
            ['حدائق الأهرام', 'Hadayek Alahram'],
            ['الحرانية', 'Haraneya'],
            ['حدائق اكتوبر', 'Hadayek October'],
            ['صفط اللبن', 'Saft Allaban'],
            ['القرية الذكية', 'Smart Village'],
            ['ارض اللواء', 'Ard Ellwaa'],
        ];

        $alexCities = [
            ['ابو قير', 'Abu Qir'],
            ['الابراهيمية', 'Al Ibrahimeyah'],
            ['الأزاريطة', 'Azarita'],
            ['الانفوشى', 'Anfoushi'],
            ['الدخيلة', 'Dekheila'],
            ['السيوف', 'El Soyof'],
            ['العامرية', 'Ameria'],
            ['اللبان', 'El Labban'],
            ['المفروزة', 'Al Mafrouza'],
            ['المنتزه', 'El Montaza'],
            ['المنشية', 'Mansheya'],
            ['الناصرية', 'Naseria'],
            ['امبروزو', 'Ambrozo'],
            ['باب شرق', 'Bab Sharq'],
            ['برج العرب', 'Bourj Alarab'],
            ['ستانلى', 'Stanley'],
            ['سموحة', 'Smouha'],
            ['سيدى بشر', 'Sidi Bishr'],
            ['شدس', 'Shads'],
            ['غيط العنب', 'Gheet Alenab'],
            ['فلمينج', 'Fleming'],
            ['فيكتوريا', 'Victoria'],
            ['كامب شيزار', 'Camp Shizar'],
            ['كرموز', 'Karmooz'],
            ['محطة الرمل', 'Mahta Alraml'],
            ['مينا البصل', 'Mina El-Basal'],
            ['العصافرة', 'Asafra'],
            ['العجمي', 'Agamy'],
            ['بكوس', 'Bakos'],
            ['بولكلي', 'Boulkly'],
            ['كليوباترا', 'Cleopatra'],
            ['جليم', 'Glim'],
            ['المعمورة', 'Al Mamurah'],
            ['المندرة', 'Al Mandara'],
            ['محرم بك', 'Moharam Bek'],
            ['الشاطبي', 'Elshatby'],
            ['سيدي جابر', 'Sidi Gaber'],
            ['الساحل الشمالي', 'North Coast/sahel'],
            ['الحضرة', 'Alhadra'],
            ['العطارين', 'Alattarin'],
            ['سيدي كرير', 'Sidi Kerir'],
            ['الجمرك', 'Elgomrok'],
            ['المكس', 'Al Max'],
            ['مارينا', 'Marina'],
        ];

        $dakahliaCities = [
            ['المنصورة', 'Mansoura'],
            ['طلخا', 'Talkha'],
            ['ميت غمر', 'Mitt Ghamr'],
            ['دكرنس', 'Dekernes'],
            ['أجا', 'Aga'],
            ['منية النصر', 'Menia El Nasr'],
            ['السنبلاوين', 'Sinbillawin'],
            ['الكردي', 'El Kurdi'],
            ['بني عبيد', 'Bani Ubaid'],
            ['المنزلة', 'Al Manzala'],
            ['تمي الأمديد', 'tami al\'amdid'],
            ['الجمالية', 'aljamalia'],
            ['شربين', 'Sherbin'],
            ['المطرية', 'Mataria'],
            ['بلقاس', 'Belqas'],
            ['ميت سلسيل', 'Meet Salsil'],
            ['جمصة', 'Gamasa'],
            ['محلة دمنة', 'Mahalat Damana'],
            ['نبروه', 'Nabroh'],
        ];

        $redSeaCities = [
            ['الغردقة', 'Hurghada'],
            ['رأس غارب', 'Ras Ghareb'],
            ['سفاجا', 'Safaga'],
            ['القصير', 'El Qusiar'],
            ['مرسى علم', 'Marsa Alam'],
            ['الشلاتين', 'Shalatin'],
            ['حلايب', 'Halaib'],
            ['الدهار', 'Aldahar'],
        ];


        $beheiraCities = [
            ['دمنهور', 'Damanhour'],
            ['كفر الدوار', 'Kafr El Dawar'],
            ['رشيد', 'Rashid'],
            ['إدكو', 'Edco'],
            ['أبو المطامير', 'Abu al-Matamir'],
            ['أبو حمص', 'Abu Homs'],
            ['الدلنجات', 'Delengat'],
            ['المحمودية', 'Mahmoudiyah'],
            ['الرحمانية', 'Rahmaniyah'],
            ['إيتاي البارود', 'Itai Baroud'],
            ['حوش عيسى', 'Housh Eissa'],
            ['شبراخيت', 'Shubrakhit'],
            ['كوم حمادة', 'Kom Hamada'],
            ['بدر', 'Badr'],
            ['وادي النطرون', 'Wadi Natrun'],
            ['النوبارية الجديدة', 'New Nubaria'],
            ['النوبارية', 'Alnoubareya'],
        ];

        $fayoumCities = [
            ['الفيوم', 'Fayoum'],
            ['الفيوم الجديدة', 'Fayoum El Gedida'],
            ['طامية', 'Tamiya'],
            ['سنورس', 'Snores'],
            ['إطسا', 'Etsa'],
            ['إبشواي', 'Epschway'],
            ['يوسف الصديق', 'Yusuf El Sediaq'],
            ['الحادقة', 'Hadqa'],
            ['اطسا', 'Atsa'],
            ['الجامعة', 'Algamaa'],
            ['السيالة', 'Sayala'],
        ];

        $gharbiyaCities = [
            ['طنطا', 'Tanta'],
            ['المحلة الكبرى', 'Al Mahalla Al Kobra'],
            ['كفر الزيات', 'Kafr El Zayat'],
            ['زفتى', 'Zefta'],
            ['السنطة', 'El Santa'],
            ['قطور', 'Qutour'],
            ['بسيون', 'Basion'],
            ['سمنود', 'Samannoud'],
        ];

        $ismailliaCities = [
            ['الإسماعيلية', 'Ismailia'],
            ['فايد', 'Fayed'],
            ['القنطرة شرق', 'Qantara Sharq'],
            ['القنطرة غرب', 'Qantara Gharb'],
            ['التل الكبير', 'El Tal El Kabier'],
            ['أبو صوير', 'Abu Sawir'],
            ['القصاصين الجديدة', 'Kasasien El Gedida'],
            ['نفيشة', 'Nefesha'],
            ['الشيخ زايد', 'Sheikh Zayed'],
            ['شبين الكوم', 'Shbeen El Koom'],
        ];

        $menofiaCities = [
            ['مدينة السادات', 'Sadat City'],
            ['منوف', 'Menouf'],
            ['سرس الليان', 'Sars El-Layan'],
            ['أشمون', 'Ashmon'],
            ['الباجور', 'Al Bagor'],
            ['قويسنا', 'Quesna'],
            ['بركة السبع', 'Berkat El Saba'],
            ['تلا', 'Tala'],
            ['الشهداء', 'Al Shohada'],
        ];

        $minyaCities = [
            ['المنيا', 'Minya'],
            ['المنيا الجديدة', 'Minya El Gedida'],
            ['العدوة', 'El Adwa'],
            ['مغاغة', 'Magagha'],
            ['بني مزار', 'Bani Mazar'],
            ['مطاي', 'Mattay'],
            ['سمالوط', 'Samalut'],
            ['المدينة الفكرية', 'Madinat El Fekria'],
            ['ملوي', 'Meloy'],
            ['دير مواس', 'Deir Mawas'],
            ['ابو قرقاص', 'Abu Qurqas'],
            ['ارض سلطان', 'Ard Sultan'],
        ];

        $qaliubiyaCities = [
            ['بنها', 'Banha'],
            ['قليوب', 'Qalyub'],
            ['شبرا الخيمة', 'Shubra Al Khaimah'],
            ['القناطر الخيرية', 'Al Qanater Charity'],
            ['الخانكة', 'Khanka'],
            ['كفر شكر', 'Kafr Shukr'],
            ['طوخ', 'Tukh'],
            ['قها', 'Qaha'],
            ['العبور', 'Obour'],
            ['الخصوص', 'Khosous'],
            ['شبين القناطر', 'Shibin Al Qanater'],
            ['مسطرد', 'Mostorod'],
        ];

        $newValleyCities = [
            ['الخارجة', 'El Kharga'],
            ['باريس', 'Paris'],
            ['موط', 'Mout'],
            ['الفرافرة', 'Farafra'],
            ['بلاط', 'Balat'],
            ['الداخلة', 'Dakhla'],
        ];


        $suezCities = [
            ['السويس', 'Suez'],
            ['الجناين', 'Alganayen'],
            ['عتاقة', 'Ataqah'],
            ['العين السخنة', 'Ain Sokhna'],
            ['فيصل', 'Faysal'],
        ];

        $aswanCities = [
            ['أسوان', 'Aswan'],
            ['أسوان الجديدة', 'Aswan El Gedida'],
            ['دراو', 'Drau'],
            ['كوم أمبو', 'Kom Ombo'],
            ['نصر النوبة', 'Nasr Al Nuba'],
            ['كلابشة', 'Kalabsha'],
            ['إدفو', 'Edfu'],
            ['الرديسية', 'Al-Radisiyah'],
            ['البصيلية', 'Al Basilia'],
            ['السباعية', 'Al Sibaeia'],
            ['ابوسمبل السياحية', 'Abo Simbl Al Siyahia'],
            ['مرسى علم', 'Marsa Alam'],
        ];

        $assiutCities = [
            ['أسيوط', 'Assiut'],
            ['أسيوط الجديدة', 'Assiut El Gedida'],
            ['ديروط', 'Dayrout'],
            ['منفلوط', 'Manfalut'],
            ['القوصية', 'Qusiya'],
            ['أبنوب', 'Abnoub'],
            ['أبو تيج', 'Abu Tig'],
            ['الغنايم', 'El Ghanaim'],
            ['ساحل سليم', 'Sahel Selim'],
            ['البداري', 'El Badari'],
            ['صدفا', 'Sidfa'],
        ];

        $beniSuefCities = [
            ['بني سويف', 'Bani Sweif'],
            ['بني سويف الجديدة', 'Beni Suef El Gedida'],
            ['الواسطى', 'Al Wasta'],
            ['ناصر', 'Naser'],
            ['إهناسيا', 'Ehnasia'],
            ['ببا', 'beba'],
            ['الفشن', 'Fashn'],
            ['سمسطا', 'Somasta'],
            ['الاباصيرى', 'Alabbaseri'],
            ['مقبل', 'Mokbel'],
        ];

        $porSaidCities = [
            ['بورسعيد', 'PorSaid'],
            ['بورفؤاد', 'Port Fouad'],
            ['العرب', 'Alarab'],
            ['حى الزهور', 'Zohour'],
            ['حى الشرق', 'Alsharq'],
            ['حى الضواحى', 'Aldawahi'],
            ['حى المناخ', 'Almanakh'],
            ['حى مبارك', 'Mubarak'],
        ];

        $damiettaCities = [
            ['دمياط', 'Damietta'],
            ['دمياط الجديدة', 'New Damietta'],
            ['رأس البر', 'Ras El Bar'],
            ['فارسكور', 'Faraskour'],
            ['الزرقا', 'Zarqa'],
            ['السرو', 'alsaru'],
            ['الروضة', 'alruwda'],
            ['كفر البطيخ', 'Kafr El-Batikh'],
            ['عزبة البرج', 'Azbet Al Burg'],
            ['ميت أبو غالب', 'Meet Abou Ghalib'],
            ['كفر سعد', 'Kafr Saad'],
        ];

        $sharkiaCities = [
            ['الزقازيق', 'Zagazig'],
            ['العاشر من رمضان', 'Al Ashr Men Ramadan'],
            ['منيا القمح', 'Minya Al Qamh'],
            ['بلبيس', 'Belbeis'],
            ['مشتول السوق', 'Mashtoul El Souq'],
            ['القنايات', 'Qenaiat'],
            ['أبو حماد', 'Abu Hammad'],
            ['القرين', 'El Qurain'],
            ['ههيا', 'Hehia'],
            ['أبو كبير', 'Abu Kabir'],
            ['فاقوس', 'Faccus'],
            ['الصالحية الجديدة', 'El Salihia El Gedida'],
            ['الإبراهيمية', 'Al Ibrahimiyah'],
            ['ديرب نجم', 'Deirb Negm'],
            ['كفر صقر', 'Kafr Saqr'],
            ['أولاد صقر', 'Awlad Saqr'],
            ['الحسينية', 'Husseiniya'],
            ['صان الحجر القبلية', 'san alhajar alqablia'],
            ['منشأة أبو عمر', 'Manshayat Abu Omar'],
        ];

        $southSinaiCities = [
            ['الطور', 'Al Toor'],
            ['شرم الشيخ', 'Sharm El-Shaikh'],
            ['دهب', 'Dahab'],
            ['نويبع', 'Nuweiba'],
            ['طابا', 'Taba'],
            ['سانت كاترين', 'Saint Catherine'],
            ['أبو رديس', 'Abu Redis'],
            ['أبو زنيمة', 'Abu Zenaima'],
            ['رأس سدر', 'Ras Sidr'],
        ];

        $kafrAlSheikhCities = [
            ['كفر الشيخ', 'Kafr El Sheikh'],
            ['وسط البلد كفر الشيخ', 'Kafr El Sheikh Downtown'],
            ['دسوق', 'Desouq'],
            ['فوه', 'Fooh'],
            ['مطوبس', 'Metobas'],
            ['برج البرلس', 'Burg Al Burullus'],
            ['بلطيم', 'Baltim'],
            ['مصيف بلطيم', 'Masief Baltim'],
            ['الحامول', 'Hamol'],
            ['بيلا', 'Bella'],
            ['الرياض', 'Riyadh'],
            ['سيدي سالم', 'Sidi Salm'],
            ['قلين', 'Qellen'],
            ['سيدي غازي', 'Sidi Ghazi'],
        ];

        $matrouhCities = [
            ['مرسى مطروح', 'Marsa Matrouh'],
            ['الحمام', 'El Hamam'],
            ['العلمين', 'Alamein'],
            ['الضبعة', 'Dabaa'],
            ['النجيلة', 'Al-Nagila'],
            ['سيدي براني', 'Sidi Brani'],
            ['السلوم', 'Salloum'],
            ['سيوة', 'Siwa'],
            ['مارينا', 'Marina'],
            ['الساحل الشمالى', 'North Coast'],
        ];

        $luxorCities = [
            ['الأقصر', 'Luxor'],
            ['الأقصر الجديدة', 'New Luxor'],
            ['إسنا', 'Esna'],
            ['طيبة الجديدة', 'New Tiba'],
            ['الزينية', 'Al ziynia'],
            ['البياضية', 'Al Bayadieh'],
            ['القرنة', 'Al Qarna'],
            ['أرمنت', 'Armant'],
            ['الطود', 'Al Tud'],
        ];

        $qenaCities = [
            ['قنا', 'Qena'],
            ['قنا الجديدة', 'New Qena'],
            ['ابو طشت', 'Abu Tesht'],
            ['نجع حمادي', 'Nag Hammadi'],
            ['دشنا', 'Deshna'],
            ['الوقف', 'Alwaqf'],
            ['قفط', 'Qaft'],
            ['نقادة', 'Naqada'],
            ['فرشوط', 'Farshout'],
            ['قوص', 'Quos'],
        ];

        $northSinaiCities = [
            ['العريش', 'Arish'],
            ['الشيخ زويد', 'Sheikh Zowaid'],
            ['نخل', 'Nakhl'],
            ['رفح', 'Rafah'],
            ['بئر العبد', 'Bir al-Abed'],
            ['الحسنة', 'Al Hasana'],
        ];

        $sohagCities = [
            ['سوهاج', 'Sohag'],
            ['سوهاج الجديدة', 'Sohag El Gedida'],
            ['أخميم', 'Akhmeem'],
            ['أخميم الجديدة', 'Akhmim El Gedida'],
            ['البلينا', 'Albalina'],
            ['المراغة', 'El Maragha'],
            ['المنشأة', 'almunsha\'a'],
            ['دار السلام', 'Dar AISalaam'],
            ['جرجا', 'Gerga'],
            ['جهينة الغربية', 'Jahina Al Gharbia'],
            ['ساقلته', 'Saqilatuh'],
            ['طما', 'Tama'],
            ['طهطا', 'Tahta'],
            ['الكوثر', 'Alkawthar']
        ];

        $governments = [
            ['القاهرة', 'Cairo', $cairoCities],
            ['الجيزة', 'Giza', $gizaCities],
            ['الأسكندرية', 'Alexandria', $alexCities],
            ['الدقهلية', 'Dakahlia', $dakahliaCities],
            ['البحر الأحمر', 'Red Sea', $redSeaCities],
            ['البحيرة', 'Beheira', $beheiraCities],
            ['الفيوم', 'Fayoum', $fayoumCities],
            ['الغربية', 'Gharbiya', $gharbiyaCities],
            ['الإسماعلية', 'Ismailia', $ismailliaCities],
            ['المنوفية', 'Menofia', $menofiaCities],
            ['المنيا', 'Minya', $minyaCities],
            ['القليوبية', 'Qaliubiya', $qaliubiyaCities],
            ['الوادي الجديد', 'New Valley', $newValleyCities],
            ['السويس', 'Suez', $suezCities],
            ['اسوان', 'Aswan', $aswanCities],
            ['اسيوط', 'Assiut', $assiutCities],
            ['بني سويف', 'Beni Suef', $beniSuefCities],
            ['بورسعيد', 'Port Said', $porSaidCities],
            ['دمياط', 'Damietta', $dakahliaCities],
            ['الشرقية', 'Sharkia', $sharkiaCities],
            ['جنوب سيناء', 'South Sinai', $southSinaiCities],
            ['كفر الشيخ', 'Kafr Al sheikh', $kafrAlSheikhCities],
            ['مطروح', 'Matrouh', $matrouhCities],
            ['الأقصر', 'Luxor', $luxorCities],
            ['قنا', 'Qena', $qenaCities],
            ['شمال سيناء', 'North Sinai', $northSinaiCities],
            ['سوهاج', 'Sohag', $sohagCities]
        ];

        foreach ($governments as $government) {
            $governmentRow = Government::create([
                'name_ar' => $government[0],
                'name_en' => $government[1],
            ]);

            foreach ($government[2] as $city) {
                $governmentRow->cities()->create([
                    'name_ar' => $city[0],
                    'name_en' => $city[1],
                ]);
            }
        }
    }
}
