<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries =
            [
                "name" => "اليَمَن",
                "capital" => "صنعاء",
                "states" => [
                    [
                        "name" => "عدن",
                        "state_code" => "AD",
                        "cities" => [
                            [
                                "name" => "عدن"
                            ],
                            [
                                "name" => "البريقة"
                            ],
                            [
                                "name" => "المنصوره"
                            ],
                            [
                                "name" => "المعلا"
                            ],
                            [
                                "name" => "الرماد شيخ عثمان"
                            ],
                            [
                                "name" => "التواهي"
                            ],
                            [
                                "name" => "كريتر"
                            ],
                            [
                                "name" => "دار سعد"
                            ]
                        ]
                    ],
                    [
                        "name" => "عمران",
                        "state_code" => "AM",
                        "cities" => [
                            [
                                "name" => "عمران"
                            ],
                            [
                                "name" => "العشا"
                            ],
                            [
                                "name" => "المدائن"
                            ],
                            [
                                "name" => "القفلة"
                            ],
                            [
                                "name" => "كالسود"
                            ],
                            [
                                "name" => "السودة"
                            ],
                            [
                                "name" => "بني صريم"
                            ],
                            [
                                "name" => "ذي بن"
                            ],
                            [
                                "name" => "هابور زليمة"
                            ],
                            [
                                "name" => "حرف سفيان"
                            ],
                            [
                                "name" => "هوث"
                            ],
                            [
                                "name" => "عيال سريح"
                            ],
                            [
                                "name" => "جبل عيال يزيد"
                            ],
                            [
                                "name" => "خمير"
                            ],
                            [
                                "name" => "خريف"
                            ],
                            [
                                "name" => "مسوار"
                            ],
                            [
                                "name" => "ريدة"
                            ],
                            [
                                "name" => "شهره"
                            ],
                            [
                                "name" => "الصوير"
                            ],
                            [
                                "name" => "ثولا"
                            ]
                        ]
                    ],
                    [
                        "name" => "أبين",
                        "state_code" => "AB",
                        "cities" => [
                            [
                                "name" => "اهوار"
                            ],
                            [
                                "name" => "المحفد"
                            ],
                            [
                                "name" => "الوديعة"
                            ],
                            [
                                "name" => "الجوف المقبابة"
                            ],
                            [
                                "name" => "جيشان"
                            ],
                            [
                                "name" => "خنفير"
                            ],
                            [
                                "name" => "لودار"
                            ],
                            [
                                "name" => "مودية"
                            ],
                            [
                                "name" => "رصد"
                            ],
                            [
                                "name" => "سرار"
                            ],
                            [
                                "name" => "سباح"
                            ],
                            [
                                "name" => "زنجبار"
                            ]
                        ]
                    ],
                    [
                        "name" => "البيضاء",
                        "state_code" => "BA",
                        "cities" => [
                            [
                                "name" => "العرش"
                            ],
                            [
                                "name" => "البيضاء"
                            ],
                            [
                                "name" => "مدينة البيضاء"
                            ],
                            [
                                "name" => "البياع"
                            ],
                            [
                                "name" => "الملاجم"
                            ],
                            [
                                "name" => "القريشية"
                            ],
                            [
                                "name" => "الرياشية"
                            ],
                            [
                                "name" => "السوادية"
                            ],
                            [
                                "name" => "السومة"
                            ],
                            [
                                "name" => "الشرفين"
                            ],
                            [
                                "name" => "في تفاح"
                            ],
                            [
                                "name" => "الظاهر"
                            ],
                            [
                                "name" => "ذي نعيم"
                            ],
                            [
                                "name" => "مصورة"
                            ],
                            [
                                "name" => "موكيراس"
                            ],
                            [
                                "name" => "نعمان"
                            ],
                            [
                                "name" => "ناتي"
                            ],
                            [
                                "name" => "رضى"
                            ],
                            [
                                "name" => "ردمان العوض"
                            ],
                            [
                                "name" => "صباح"
                            ],
                            [
                                "name" => "والد ربيع"
                            ]
                        ]
                    ],
                    [
                        "name" => "الحديده",
                        "state_code" => "HU",
                        "cities" => [
                            [
                                "name" => "الضاحي"
                            ],
                            [
                                "name" => "الدريهمي"
                            ],
                            [
                                "name" => "الجراحى"
                            ],
                            [
                                "name" => "الحجايلة"
                            ],
                            [
                                "name" => "الحلي"
                            ],
                            [
                                "name" => "الحواك"
                            ],
                            [
                                "name" => "الحديدة"
                            ],
                            [
                                "name" => "المنصورية"
                            ],
                            [
                                "name" => "المراوعة"
                            ],
                            [
                                "name" => "المغلف"
                            ],
                            [
                                "name" => "الميناء"
                            ],
                            [
                                "name" => "المنيرة"
                            ],
                            [
                                "name" => "القناويص"
                            ],
                            [
                                "name" => "اللحي"
                            ],
                            [
                                "name" => "الصليف"
                            ],
                            [
                                "name" => "السخنة"
                            ],
                            [
                                "name" => "في التحيات"
                            ],
                            [
                                "name" => "الزيدية"
                            ],
                            [
                                "name" => "الزهرة"
                            ],
                            [
                                "name" => "باجل"
                            ],
                            [
                                "name" => "بيت الفقيه"
                            ],
                            [
                                "name" => "بورا"
                            ],
                            [
                                "name" => "هايز"
                            ],
                            [
                                "name" => "جبل رأس"
                            ],
                            [
                                "name" => "كمران"
                            ],
                            [
                                "name" => "زبيد"
                            ]
                        ]
                    ],
                    [
                        "name" => "الجوف",
                        "state_code" => "JA",
                        "cities" => [
                            [
                                "name" => "العنان"
                            ],
                            [
                                "name" => "الغيل"
                            ],
                            [
                                "name" => "الحزم"
                            ],
                            [
                                "name" => "الحميدات"
                            ],
                            [
                                "name" => "الخلق"
                            ],
                            [
                                "name" => "المصلوب"
                            ],
                            [
                                "name" => "المطمة"
                            ],
                            [
                                "name" => "آل ماتون"
                            ],
                            [
                                "name" => "الظاهر"
                            ],
                            [
                                "name" => "باري العنان"
                            ],
                            [
                                "name" => "خاب والشعف"
                            ],
                            [
                                "name" => "خراب المرعشي"
                            ],
                            [
                                "name" => "راجوزة"
                            ]
                        ]
                    ],
                    [
                        "name" => "المهره",
                        "state_code" => "MR",
                        "cities" => [
                            [
                                "name" => "الغيضة"
                            ],
                            [
                                "name" => "الغازية"
                            ],
                            [
                                "name" => "المسيلة"
                            ],
                            [
                                "name" => "قبعة"
                            ],
                            [
                                "name" => "هوف"
                            ],
                            [
                                "name" => "حسين"
                            ],
                            [
                                "name" => "منار"
                            ],
                            [
                                "name" => "قشن"
                            ],
                            [
                                "name" => "سيحوت"
                            ],
                            [
                                "name" => "شاهان"
                            ]
                        ]
                    ],
                    [
                        "name" => "المحويت",
                        "state_code" => "MW",
                        "cities" => [
                            [
                                "name" => "الخبت"
                            ],
                            [
                                "name" => "المحويت"
                            ],
                            [
                                "name" => "الرجم"
                            ],
                            [
                                "name" => "الطويلة"
                            ],
                            [
                                "name" => "بني سعد"
                            ],
                            [
                                "name" => "حفاش"
                            ],
                            [
                                "name" => "ميلهان"
                            ],
                            [
                                "name" => "شبام كوكبان"
                            ]
                        ]
                    ],
                    [
                        "name" => "ذمار",
                        "state_code" => "DH",
                        "cities" => [
                            [
                                "name" => "الجواب"
                            ],
                            [
                                "name" => "الحداء"
                            ],
                            [
                                "name" => "المنار"
                            ],
                            [
                                "name" => "قرية المدي"
                            ],
                            [
                                "name" => "ضوران انس"
                            ],
                            [
                                "name" => "ذمار"
                            ],
                            [
                                "name" => "جبل الشرق"
                            ],
                            [
                                "name" => "جهران"
                            ],
                            [
                                "name" => "مغرب أنس"
                            ],
                            [
                                "name" => "ميفعات انس"
                            ],
                            [
                                "name" => "عتمه"
                            ],
                            [
                                "name" => "وصاب العالي"
                            ],
                            [
                                "name" => "وصاب السافل"
                            ]
                        ]
                    ],
                    [
                        "name" => "حضرموت",
                        "state_code" => "HD",
                        "cities" => [
                            [
                                "name" => "الديس الشرقية"
                            ],
                            [
                                "name" => "الدوس الشرقية"
                            ],
                            [
                                "name" => "Adh Dhlia'ah"
                            ],
                            [
                                "name" => "العبر"
                            ],
                            [
                                "name" => "الحمدي"
                            ],
                            [
                                "name" => "المكلا"
                            ],
                            [
                                "name" => "القف"
                            ],
                            [
                                "name" => "القطن"
                            ],
                            [
                                "name" => "أمد"
                            ],
                            [
                                "name" => "الريدة والقصير"
                            ],
                            [
                                "name" => "As Sawm"
                            ],
                            [
                                "name" => "الشحر"
                            ],
                            [
                                "name" => "At Taḩāluf"
                            ],
                            [
                                "name" => "بروم ميفا"
                            ],
                            [
                                "name" => "دعوان"
                            ],
                            [
                                "name" => "غيل باوزير"
                            ],
                            [
                                "name" => "غيل بن يمين"
                            ],
                            [
                                "name" => "حجر الصيعر"
                            ],
                            [
                                "name" => "هاجر"
                            ],
                            [
                                "name" => "حريدة"
                            ],
                            [
                                "name" => "كيلميا"
                            ],
                            [
                                "name" => "المكلا"
                            ],
                            [
                                "name" => "رخيّة"
                            ],
                            [
                                "name" => "رماح"
                            ],
                            [
                                "name" => "ساه"
                            ],
                            [
                                "name" => "سيئون"
                            ],
                            [
                                "name" => "شبام"
                            ],
                            [
                                "name" => "سهيل شبام"
                            ],
                            [
                                "name" => "تريم"
                            ],
                            [
                                "name" => "ثمود"
                            ],
                            [
                                "name" => "وادي العين"
                            ],
                            [
                                "name" => "يابوث"
                            ],
                            [
                                "name" => "Zamakh wa Manwakh"
                            ]
                        ]
                    ],
                    [
                        "name" => "حجة",
                        "state_code" => "HJ",
                        "cities" => [
                            [
                                "name" => "عبس"
                            ],
                            [
                                "name" => "افلح اليمن"
                            ],
                            [
                                "name" => "افلح الشوم"
                            ],
                            [
                                "name" => "الجميمة"
                            ],
                            [
                                "name" => "المغربه"
                            ],
                            [
                                "name" => "المحبيشه"
                            ],
                            [
                                "name" => "المفتاح"
                            ],
                            [
                                "name" => "Ash Shaghadirah"
                            ],
                            [
                                "name" => "Ash Shahil"
                            ],
                            [
                                "name" => "Aslem"
                            ],
                            [
                                "name" => "Bakil Al Mir"
                            ],
                            [
                                "name" => "Banī al ‘Awwām"
                            ],
                            [
                                "name" => "Bani Al Awam"
                            ],
                            [
                                "name" => "Bani Qa'is"
                            ],
                            [
                                "name" => "Hajjah"
                            ],
                            [
                                "name" => "Harad District"
                            ],
                            [
                                "name" => "Hayran"
                            ],
                            [
                                "name" => "Khayran Al Muharraq"
                            ],
                            [
                                "name" => "Ku'aydinah"
                            ],
                            [
                                "name" => "Kuhlan Affar"
                            ],
                            [
                                "name" => "Kuhlan Ash Sharaf"
                            ],
                            [
                                "name" => "Kushar"
                            ],
                            [
                                "name" => "Mabyan"
                            ],
                            [
                                "name" => "Midi"
                            ],
                            [
                                "name" => "Mustaba"
                            ],
                            [
                                "name" => "Najrah"
                            ],
                            [
                                "name" => "Qafl Shamer"
                            ],
                            [
                                "name" => "Qarah"
                            ],
                            [
                                "name" => "Sharas"
                            ],
                            [
                                "name" => "Wadhrah"
                            ],
                            [
                                "name" => "Washḩah"
                            ]
                        ]
                    ],
                    [
                        "name" => "إب",
                        "state_code" => "IB",
                        "cities" => [
                            [
                                "name" => "Al ‘Udayn"
                            ],
                            [
                                "name" => "Al Dhihar"
                            ],
                            [
                                "name" => "Al Makhādir"
                            ],
                            [
                                "name" => "Al Mashannah"
                            ],
                            [
                                "name" => "Al Qafr"
                            ],
                            [
                                "name" => "An Nādirah"
                            ],
                            [
                                "name" => "Ar Radmah"
                            ],
                            [
                                "name" => "As Sabrah"
                            ],
                            [
                                "name" => "As Saddah"
                            ],
                            [
                                "name" => "As Sayyani"
                            ],
                            [
                                "name" => "Ash Sha'ir"
                            ],
                            [
                                "name" => "Ba'dan"
                            ],
                            [
                                "name" => "Dhī as Sufāl"
                            ],
                            [
                                "name" => "Far Al Udayn"
                            ],
                            [
                                "name" => "Hazm Al Udayn"
                            ],
                            [
                                "name" => "Hubaysh"
                            ],
                            [
                                "name" => "Ibb"
                            ],
                            [
                                "name" => "Jiblah"
                            ],
                            [
                                "name" => "Mudhaykhirah"
                            ],
                            [
                                "name" => "Yarīm"
                            ]
                        ]
                    ],
                    [
                        "name" => "لحج",
                        "state_code" => "LA",
                        "cities" => [
                            [
                                "name" => "Al  Hawtah"
                            ],
                            [
                                "name" => "Al Ḩabīlayn"
                            ],
                            [
                                "name" => "Al Had"
                            ],
                            [
                                "name" => "Al Madaribah Wa Al Arah"
                            ],
                            [
                                "name" => "Al Maflahy"
                            ],
                            [
                                "name" => "Al Maqatirah"
                            ],
                            [
                                "name" => "Al Milah"
                            ],
                            [
                                "name" => "Al Musaymir"
                            ],
                            [
                                "name" => "Al Qabbaytah"
                            ],
                            [
                                "name" => "Habil Jabr"
                            ],
                            [
                                "name" => "Halimayn"
                            ],
                            [
                                "name" => "Laḩij"
                            ],
                            [
                                "name" => "Radfan"
                            ],
                            [
                                "name" => "Tuban"
                            ],
                            [
                                "name" => "Tur Al Bahah"
                            ],
                            [
                                "name" => "Yafa'a"
                            ],
                            [
                                "name" => "Yahr"
                            ]
                        ]
                    ],
                    [
                        "name" => "مأرب",
                        "state_code" => "MA",
                        "cities" => [
                            [
                                "name" => "Al Abdiyah"
                            ],
                            [
                                "name" => "Al Jubah"
                            ],
                            [
                                "name" => "Bidbadah"
                            ],
                            [
                                "name" => "Ḩarīb"
                            ],
                            [
                                "name" => "Harib Al Qaramish"
                            ],
                            [
                                "name" => "Jabal Murad"
                            ],
                            [
                                "name" => "Ma'rib"
                            ],
                            [
                                "name" => "Mahliyah"
                            ],
                            [
                                "name" => "Majzar"
                            ],
                            [
                                "name" => "Marib"
                            ],
                            [
                                "name" => "Marib City"
                            ],
                            [
                                "name" => "Medghal"
                            ],
                            [
                                "name" => "Raghwan"
                            ],
                            [
                                "name" => "Rahabah"
                            ],
                            [
                                "name" => "Sirwah"
                            ]
                        ]
                    ],
                    [
                        "name" => "ريمة",
                        "state_code" => "RA",
                        "cities" => [
                            [
                                "name" => "Al Jabin"
                            ],
                            [
                                "name" => "Al Jafariyah"
                            ],
                            [
                                "name" => "As Salafiyah"
                            ],
                            [
                                "name" => "Bilad At Ta'am"
                            ],
                            [
                                "name" => "Kusmah"
                            ],
                            [
                                "name" => "Mazhar"
                            ]
                        ]
                    ],
                    [
                        "name" => "صعدة",
                        "state_code" => "SD",
                        "cities" => [
                            [
                                "name" => "Al Dhaher"
                            ],
                            [
                                "name" => "Al Hashwah"
                            ],
                            [
                                "name" => "As Safra"
                            ],
                            [
                                "name" => "Ash Shawātī"
                            ],
                            [
                                "name" => "Baqim"
                            ],
                            [
                                "name" => "Ghamr"
                            ],
                            [
                                "name" => "Haydan"
                            ],
                            [
                                "name" => "Kitaf wa Al Boqe'e"
                            ],
                            [
                                "name" => "Majz"
                            ],
                            [
                                "name" => "Monabbih"
                            ],
                            [
                                "name" => "Qatabir"
                            ],
                            [
                                "name" => "Rāziḩ"
                            ],
                            [
                                "name" => "Sa'dah"
                            ],
                            [
                                "name" => "Şa‘dah"
                            ],
                            [
                                "name" => "Saḩār"
                            ],
                            [
                                "name" => "Saqayn"
                            ],
                            [
                                "name" => "Shada'a"
                            ]
                        ]
                    ],
                    [
                        "name" => "صنعاء",
                        "state_code" => "SA",
                        "cities" => [
                            [
                                "name" => "الحيمه الداخلية"
                            ],
                            [
                                "name" => "الحيمه الخارجية"
                            ],
                            [
                                "name" => "الحصن"
                            ],
                            [
                                "name" => "أرحب"
                            ],
                            [
                                "name" => "الطيال"
                            ],
                            [
                                "name" => "بني ضبيان"
                            ],
                            [
                                "name" => "صعفان"
                            ],
                            [
                                "name" => "بلاد الروس"
                            ],
                            [
                                "name" => "جحانة"
                            ],
                            [
                                "name" => "مناخة"
                            ],
                            [
                                "name" => "بني حشيش"
                            ],
                            [
                                "name" => "خولان"
                            ],
                            [
                                "name" => "نهم"
                            ],
                            [
                                "name" => "بني مطر"
                            ],
                            [
                                "name" => "سنحان"
                            ],
                            [
                                "name" => "بني بهلول"
                            ],
                            [
                                "name" => "همدان"
                            ],
                            [
                                "name" => "صنعاء"
                            ]
                        ]
                    ],
                    [
                        "name" => "شبوه",
                        "state_code" => "SH",
                        "cities" => [
                            [
                                "name" => "Ain"
                            ],
                            [
                                "name" => "Al ‘Āqir"
                            ],
                            [
                                "name" => "Al Talh"
                            ],
                            [
                                "name" => "AL-khashā upper"
                            ],
                            [
                                "name" => "Ar Rawdah"
                            ],
                            [
                                "name" => "Arma"
                            ],
                            [
                                "name" => "As Said"
                            ],
                            [
                                "name" => "Ataq"
                            ],
                            [
                                "name" => "Bayhan"
                            ],
                            [
                                "name" => "Dhar"
                            ],
                            [
                                "name" => "Habban"
                            ],
                            [
                                "name" => "Hatib"
                            ],
                            [
                                "name" => "Jardan"
                            ],
                            [
                                "name" => "Khimār"
                            ],
                            [
                                "name" => "Mayfa'a"
                            ],
                            [
                                "name" => "Merkhah Al Ulya"
                            ],
                            [
                                "name" => "Merkhah As Sufla"
                            ],
                            [
                                "name" => "Nisab"
                            ],
                            [
                                "name" => "Rudum"
                            ],
                            [
                                "name" => "Usaylan"
                            ]
                        ]
                    ],
                    [
                        "name" => "سقطره",
                        "state_code" => "SU",
                        "cities" => [
                            [
                                "name" => "Hadibu"
                            ],
                            [
                                "name" => "Hidaybu"
                            ],
                            [
                                "name" => "Qalansīyah"
                            ],
                            [
                                "name" => "Qulensya Wa Abd Al Kuri"
                            ]
                        ]
                    ],
                    [
                        "name" => "تعز",
                        "state_code" => "TA",
                        "cities" => [
                            [
                                "name" => "Al Ma'afer"
                            ],
                            [
                                "name" => "Al Mawasit"
                            ],
                            [
                                "name" => "Al Misrakh"
                            ],
                            [
                                "name" => "Al Mudhaffar"
                            ],
                            [
                                "name" => "Al Mukhā’"
                            ],
                            [
                                "name" => "Al Qahirah"
                            ],
                            [
                                "name" => "Al Wazi'iyah"
                            ],
                            [
                                "name" => "As Silw"
                            ],
                            [
                                "name" => "Ash Shamayatayn"
                            ],
                            [
                                "name" => "At Ta‘izzīyah"
                            ],
                            [
                                "name" => "Dhubab"
                            ],
                            [
                                "name" => "Dimnat Khadir"
                            ],
                            [
                                "name" => "Hayfan"
                            ],
                            [
                                "name" => "Jabal Habashy"
                            ],
                            [
                                "name" => "Maqbanah"
                            ],
                            [
                                "name" => "Mashra'a Wa Hadnan"
                            ],
                            [
                                "name" => "Māwīyah"
                            ],
                            [
                                "name" => "Mawza"
                            ],
                            [
                                "name" => "Sabir Al Mawadim"
                            ],
                            [
                                "name" => "Salh"
                            ],
                            [
                                "name" => "Sama"
                            ],
                            [
                                "name" => "Shara'b Ar Rawnah"
                            ],
                            [
                                "name" => "Shara'b As Salam"
                            ],
                            [
                                "name" => "Ta‘izz"
                            ],
                            [
                                "name" => "Village of ALAMRAH"
                            ]
                        ]
                    ]
                ]
            ];
        $countryId =  Country::insertGetId([
            "name" => "اليَمَن",
            "capital" => "صنعاء",
        ]);
        foreach ($countries['states'] as $state) {
            $stateId =  State::insertGetId([
                "name" => $state['name'],
                "state_code" => $state['state_code'],
                'country_id' => $countryId
            ]);
            foreach ($state['cities'] as $city) {
                City::create([
                    "name" =>  $city['name'],
                    'state_id' => $stateId
                ]);
            }
        }
    }
}
