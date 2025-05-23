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
            '15 مايو',
            'الازبكية',
            'البساتين',
            'التبين',
            'الخليفة',
            'الدراسة',
            'الدرب الاحمر',
            'الزاوية الحمراء',
            'الزيتون',
            'الساحل',
            'السلام',
            'السيدة زينب',
            'الشرابية',
            'مدينة الشروق',
            'الظاهر',
            'العتبة',
            'القاهرة الجديدة',
            'المرج',
            'عزبة النخل',
            'المطرية',
            'المعادى',
            'المعصرة',
            'المقطم',
            'المنيل',
            'الموسكى',
            'النزهة',
            'الوايلى',
            'باب الشعرية',
            'بولاق',
            'جاردن سيتى',
            'حدائق القبة',
            'حلوان',
            'دار السلام',
            'شبرا',
            'طره',
            'عابدين',
            'عباسية',
            'عين شمس',
            'مدينة نصر',
            'مصر الجديدة',
            'مصر القديمة',
            'منشية ناصر',
            'مدينة بدر',
            'مدينة العبور',
            'وسط البلد',
            'الزمالك',
            'قصر النيل',
            'الرحاب',
            'القطامية',
            'مدينتي',
            'روض الفرج',
            'شيراتون',
            'الجمالية',
            'العاشر من رمضان',
            'الحلمية',
            'النزهة الجديدة',
            'العاصمة الإدارية'
        ];

        $gizaCities = [
            'الجيزة',
            'السادس من أكتوبر',
            'الشيخ زايد',
            'الحوامدية',
            'البدرشين',
            'الصف',
            'أطفيح',
            'العياط',
            'الباويطي',
            'منشأة القناطر',
            'أوسيم',
            'كرداسة',
            'أبو النمرس',
            'كفر غطاطي',
            'منشأة البكاري',
            'الدقى',
            'العجوزة',
            'الهرم',
            'الوراق',
            'امبابة',
            'بولاق الدكرور',
            'الواحات البحرية',
            'العمرانية',
            'المنيب',
            'بين السرايات',
            'الكيت كات',
            'المهندسين',
            'فيصل',
            'أبو رواش',
            'حدائق الأهرام',
            'الحرانية',
            'حدائق اكتوبر',
            'صفط اللبن',
            'القرية الذكية',
            'ارض اللواء'
        ];

        $alexCities = [
            'ابو قير',
            'الابراهيمية',
            'الأزاريطة',
            'الانفوشى',
            'الدخيلة',
            'السيوف',
            'العامرية',
            'اللبان',
            'المفروزة',
            'المنتزه',
            'المنشية',
            'الناصرية',
            'امبروزو',
            'باب شرق',
            'برج العرب',
            'ستانلى',
            'سموحة',
            'سيدى بشر',
            'شدس',
            'غيط العنب',
            'فلمينج',
            'فيكتوريا',
            'كامب شيزار',
            'كرموز',
            'محطة الرمل',
            'مينا البصل',
            'العصافرة',
            'العجمي',
            'بكوس',
            'بولكلي',
            'كليوباترا',
            'جليم',
            'المعمورة',
            'المندرة',
            'محرم بك',
            'الشاطبي',
            'سيدي جابر',
            'الساحل الشمالي',
            'الحضرة',
            'العطارين',
            'سيدي كرير',
            'الجمرك',
            'المكس',
            'مارينا'
        ];

        $dakahliaCities = [
            'المنصورة',
            'طلخا',
            'ميت غمر',
            'دكرنس',
            'أجا',
            'منية النصر',
            'السنبلاوين',
            'الكردي',
            'بني عبيد',
            'المنزلة',
            'تمي الأمديد',
            'الجمالية',
            'شربين',
            'المطرية',
            'بلقاس',
            'ميت سلسيل',
            'جمصة',
            'محلة دمنة',
            'نبروه'
        ];

        $redSeaCities = [
            'الغردقة',
            'رأس غارب',
            'سفاجا',
            'القصير',
            'مرسى علم',
            'الشلاتين',
            'حلايب',
            'الدهار'
        ];

        $beheiraCities = [
            'دمنهور',
            'كفر الدوار',
            'رشيد',
            'إدكو',
            'أبو المطامير',
            'أبو حمص',
            'الدلنجات',
            'المحمودية',
            'الرحمانية',
            'إيتاي البارود',
            'حوش عيسى',
            'شبراخيت',
            'كوم حمادة',
            'بدر',
            'وادي النطرون',
            'النوبارية الجديدة',
            'النوبارية'
        ];

        $fayoumCities = [
            'الفيوم',
            'الفيوم الجديدة',
            'طامية',
            'سنورس',
            'إطسا',
            'إبشواي',
            'يوسف الصديق',
            'الحادقة',
            'اطسا',
            'الجامعة',
            'السيالة'
        ];

        $gharbiyaCities = [
            'طنطا',
            'المحلة الكبرى',
            'كفر الزيات',
            'زفتى',
            'السنطة',
            'قطور',
            'بسيون',
            'سمنود'
        ];

        $ismailliaCities = [
            'الإسماعيلية',
            'فايد',
            'القنطرة شرق',
            'القنطرة غرب',
            'التل الكبير',
            'أبو صوير',
            'القصاصين الجديدة',
            'نفيشة',
            'الشيخ زايد',
            'شبين الكوم'
        ];

        $menofiaCities = [
            'مدينة السادات',
            'منوف',
            'سرس الليان',
            'أشمون',
            'الباجور',
            'قويسنا',
            'بركة السبع',
            'تلا',
            'الشهداء'
        ];

        $minyaCities = [
            'المنيا',
            'المنيا الجديدة',
            'العدوة',
            'مغاغة',
            'بني مزار',
            'مطاي',
            'سمالوط',
            'المدينة الفكرية',
            'ملوي',
            'دير مواس',
            'ابو قرقاص',
            'ارض سلطان'
        ];

        $qaliubiyaCities = [
            'بنها',
            'قليوب',
            'شبرا الخيمة',
            'القناطر الخيرية',
            'الخانكة',
            'كفر شكر',
            'طوخ',
            'قها',
            'العبور',
            'الخصوص',
            'شبين القناطر',
            'مسطرد'
        ];

        $newValleyCities = [
            'الخارجة',
            'باريس',
            'موط',
            'الفرافرة',
            'بلاط',
            'الداخلة'
        ];

        $suezCities = [
            'السويس',
            'الجناين',
            'عتاقة',
            'العين السخنة',
            'فيصل'
        ];

        $aswanCities = [
            'أسوان',
            'أسوان الجديدة',
            'دراو',
            'كوم أمبو',
            'نصر النوبة',
            'كلابشة',
            'إدفو',
            'الرديسية',
            'البصيلية',
            'السباعية',
            'ابوسمبل السياحية',
            'مرسى علم'
        ];

        $assiutCities = [
            'أسيوط',
            'أسيوط الجديدة',
            'ديروط',
            'منفلوط',
            'القوصية',
            'أبنوب',
            'أبو تيج',
            'الغنايم',
            'ساحل سليم',
            'البداري',
            'صدفا'
        ];

        $beniSuefCities = [
            'بني سويف',
            'بني سويف الجديدة',
            'الواسطى',
            'ناصر',
            'إهناسيا',
            'ببا',
            'الفشن',
            'سمسطا',
            'الاباصيرى',
            'مقبل'
        ];

        $porSaidCities = [
            'بورسعيد',
            'بورفؤاد',
            'العرب',
            'حى الزهور',
            'حى الشرق',
            'حى الضواحى',
            'حى المناخ',
            'حى مبارك'
        ];

        $damiettaCities = [
            'دمياط',
            'دمياط الجديدة',
            'رأس البر',
            'فارسكور',
            'الزرقا',
            'السرو',
            'الروضة',
            'كفر البطيخ',
            'عزبة البرج',
            'ميت أبو غالب',
            'كفر سعد'
        ];

        $sharkiaCities = [
            'الزقازيق',
            'العاشر من رمضان',
            'منيا القمح',
            'بلبيس',
            'مشتول السوق',
            'القنايات',
            'أبو حماد',
            'القرين',
            'ههيا',
            'أبو كبير',
            'فاقوس',
            'الصالحية الجديدة',
            'الإبراهيمية',
            'ديرب نجم',
            'كفر صقر',
            'أولاد صقر',
            'الحسينية',
            'صان الحجر القبلية',
            'منشأة أبو عمر'
        ];

        $southSinaiCities = [
            'الطور',
            'شرم الشيخ',
            'دهب',
            'نويبع',
            'طابا',
            'سانت كاترين',
            'أبو رديس',
            'أبو زنيمة',
            'رأس سدر'
        ];

        $kafrAlSheikhCities = [
            'كفر الشيخ',
            'وسط البلد كفر الشيخ',
            'دسوق',
            'فوه',
            'مطوبس',
            'برج البرلس',
            'بلطيم',
            'مصيف بلطيم',
            'الحامول',
            'بيلا',
            'الرياض',
            'سيدي سالم',
            'قلين',
            'سيدي غازي'
        ];

        $matrouhCities = [
            'مرسى مطروح',
            'الحمام',
            'العلمين',
            'الضبعة',
            'النجيلة',
            'سيدي براني',
            'السلوم',
            'سيوة',
            'مارينا',
            'الساحل الشمالى'
        ];

        $luxorCities = [
            'الأقصر',
            'الأقصر الجديدة',
            'إسنا',
            'طيبة الجديدة',
            'الزينية',
            'البياضية',
            'القرنة',
            'أرمنت',
            'الطود'
        ];

        $qenaCities = [
            'قنا',
            'قنا الجديدة',
            'ابو طشت',
            'نجع حمادي',
            'دشنا',
            'الوقف',
            'قفط',
            'نقادة',
            'فرشوط',
            'قوص'
        ];

        $northSinaiCities = [
            'العريش',
            'الشيخ زويد',
            'نخل',
            'رفح',
            'بئر العبد',
            'الحسنة'
        ];

        $sohagCities = [
            'سوهاج',
            'سوهاج الجديدة',
            'أخميم',
            'أخميم الجديدة',
            'البلينا',
            'المراغة',
            'المنشأة',
            'دار السلام',
            'جرجا',
            'جهينة الغربية',
            'ساقلته',
            'طما',
            'طهطا',
            'الكوثر'
        ];



        $governments = [
            ['القاهرة', $cairoCities],
            ['الجيزة', $gizaCities],
            ['الأسكندرية', $alexCities],
            ['الدقهلية', $dakahliaCities],
            ['البحر الأحمر', $redSeaCities],
            ['البحيرة', $beheiraCities],
            ['الفيوم', $fayoumCities],
            ['الغربية', $gharbiyaCities],
            ['الإسماعلية', $ismailliaCities],
            ['المنوفية', $menofiaCities],
            ['المنيا', $minyaCities],
            ['القليوبية', $qaliubiyaCities],
            ['الوادي الجديد', $newValleyCities],
            ['السويس', $suezCities],
            ['اسوان', $aswanCities],
            ['اسيوط', $assiutCities],
            ['بني سويف', $beniSuefCities],
            ['بورسعيد', $porSaidCities],
            ['دمياط', $damiettaCities],
            ['الشرقية', $sharkiaCities],
            ['جنوب سيناء', $southSinaiCities],
            ['كفر الشيخ', $kafrAlSheikhCities],
            ['مطروح', $matrouhCities],
            ['الأقصر', $luxorCities],
            ['قنا', $qenaCities],
            ['شمال سيناء', $northSinaiCities],
            ['سوهاج', $sohagCities]
        ];

        foreach ($governments as $government) {
            $governmentRow = Government::create([
                'name' => $government[0],
            ]);

            foreach ($government[1] as $city) {
                $governmentRow->cities()->create([
                    'name' => $city,
                ]);
            }
        }
    }
}
