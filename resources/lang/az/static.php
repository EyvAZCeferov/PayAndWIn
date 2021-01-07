<?php

return [
    'menu' => [
        '404' => 'Səhifə tapılmadı',
        'loginRegister' => [
            'lrTitle' => 'Daxil ol | Qeydiyyatdan keç',
            'login' => 'Daxil ol',
            'register' => 'Qeydiyyatdan keç'
        ],
        'account' => 'Hesabım',
        'home' => 'Ana Səhifə',
        'about' => 'Haqqımızda',
        'contact' => 'Bizimlə Əlaqə',
        'index' => 'Ana səhifə',
        'faq' => 'FAQ',
        'termofuse' => 'İstifadə şərtləri',
        'categories' => 'Kateqoriyalar',
        'products' => 'Məhsullar',
        'shops' => 'Mağazalar',
        'campaigns' => 'Kampaniyalar',
        'customers' => 'Müştərilər',
        'search'=>'Axtarış nəticəsi',
        'shopping'=>[
            'wishlists'=>'İstək listi',
            'cartlists'=>'Alış-veriş listi',
            'checkout'=>'Ödəniş',
            'ordersuccess'=>'Ödəniş tamamlandı',
            'trackProduct'=>'Məhsulu izlə'
        ],
        'profile'=>[
            'index'=>':name Hesabı',
            'cards'=>':name kartları',
            'payed'=>':name ödənişlər',
            'settings'=>':name sazlamalar',
            'pininfo'=>':name pinlər'
        ],
    ],
    'page' => [
        'index'=>[
            'weArePW'=>'Biz Pay And Win ik!',
            'showCartList'=>'Siyahı'
        ],
        'loginRegister' => [
            'login' => [
                'desc' => 'Xoş gəlmişsiniz! Daxil olun!',
            ],
            'register' => [
                'desc' => 'PW hesabını yarat!',
                'form'=>[
                    'setPassword'=>'Giriş şifrəsi təyin et',
                ],
            ],
            'verify'=>[
                'verifyInput'=>'Təsdiq kodunu daxil edin',
                'verify'=>'Təsdiqlə'
            ],
        ],
        '404' => [
            'desc' => 'Ana səhifəyə keçid edə bilərsiniz.',
        ],
        'contactus' => [
            'title' => 'BİZİMLƏ ƏLAQƏ',
            'leavemessage' => 'Məktub yazın',

        ],
        'about' => [
            'title' => 'Kiçik hekayəmizi öyrənin.',
            'whychooseus' => [
                'title' => 'Bizi Niyə Seçməlisiniz'
            ],
            'teams' => [
                'wearefamily' => 'Biz bir ailəyik!',
                'title' => 'Pay and Win ailəsi ilə tanış ol.'
            ],
        ],
        'campaigns' => [
            'comments' => 'Şərhlər'
        ],
        'customers' => [
            'customer' => [
                'maps' => 'Xəritə',
                'comments' => 'Şərhlər :count',
                'notHaveComment'=>'Şərh yoxdur.',
                'addComment'=>"Şərhini bölüş"
            ],
            'campaigns'=>[
                'all'=>'Bütün mağazalar'
            ],
            'products'=>[
                'byPrice'=>'Qiymət ilə'
            ],
        ],
        'shopping'=>[
            'wishlist'=>[
                'tableheader'=>[
                    'productName'=>'Məhsul',
                    'price'=>'Qiymət',
                    'stockstat'=>[
                        'title'=>'Stok statutusu',
                        'inStock'=>'Stok da',
                        'outStock'=>'Qurtarıb',
                    ],
                    'addToCart'=>'Karta əlavə et'
                ],
            ],
            'cartlist'=>[
                'tableheader'=>[
                    'total'=>'Ümumi',
                    'qyt'=>'Miqdar',
                ],
                'other'=>[
                    'subtotal'=>'Yekun',
                    'clearCart'=>'Kartı sıfırla',
                    'updateCart'=>'Kartı yenilə',
                    'continueCart'=>'Ödəməyə davam et',
                ],
            ],
            'checkout'=>[
                'other'=>[
                    'endShopping'=>'Ödənişi təsdiqlə',
                    'cupponCode'=>'Kupon kodu',
                ],
                'order'=>[
                    'yourOrder'=>'Sizin sifariş',
                ],
            ],
            'order'=>[
                'other'=>[
                    'describe'=>'Ödənişiniz üçün təşəkkürlər :)'
                ],
            ],
            'track'=>[
                'other'=>[
                    'describe'=>'Sifariş "İD"-nizi daxil edin.',
                    'orderId'=>'Sifariş İD',
                    'track'=>'İzlə',
                ],
            ],
        ],
        'profile'=>[
            'tabs'=>[
                'dashboard'=>'İdarə paneli',
                'cards'=>'Kartlar',
                'payed'=>'Ödənişlər',
                'settings'=>'Sazlamalar',
                'logout'=>'Çıxış et',
            ],
            'table'=>[
                'columns'=>[
                    'icon'=>'İkon',
                    'number'=>'Kart nömrəsi',
                    'expirationDate'=>'Bitmə tarixi',
                    'remove'=>'Sil',
                    'money'=>'Məbləğ',
                    'market'=>'Market',
                    'payedCart'=>'Ödənilmiş kart',
                    'edvreturn'=>'Ədv geri al',
                    'buttons'=>'Düymələr'
                ],
            ],
            'settings'=>[
                'form'=>[
                    'labels'=>[
                        'profilePicture'=>'Şəkil seç',
                        'birthday'=>'Doğum tarixi',
                    ],
                    'buttons'=>[
                        'savechanges'=>'Yadda saxla'
                    ],
                ],
            ],
            'addCart'=>[
                'columns'=>[
                    'nameAndSurname'=>'Ad Soyad',
                    'cardholderName'=>'Kart sahibi adı',
                    'securityCode'=>'Güvənlik şifrəsi',
                    'generate'=>'Nümunə göstər',
                    'cartPass'=>'Kartın şifrəsi'
                ],
            ],
            'pininfo'=>[
                'headers'=>[
                    'pins'=>'Pinlərim',
                    'justPins'=>'Hazırki pinlərim :count',
                    'pinpaying'=>'Pinlə ödə',
                    'bonushistory'=>'Bonus tarixçəsi',
                    'payinghistory'=>'Ödəniş tarixçəsi',
                    'nullhistory'=>'Tarixçə boşdur',
                ],
                'table'=>[
                    'organization'=>'Qurum',
                    'date'=>'Tarix',
                    'bonus'=>'Bonus',
                    'description'=>'Açıqlama',
                    'location'=>'Məkan',
                    'contact'=>'Əlaqə',
                    'pin'=>'Pin'
                ],
                'actions'=>[
                    'buy'=>'Al'
                ],
            ],
        ],
    ],
    'standart' => [
        'topPanel' => [
            'search' => 'Axtar',
            'searchPlaceholder' => 'Axtarılacaq sözü yazın...',
            'searchLocations'=>'Axtarılacaq məkanı daxil edin...',
            'contactMail' => 'Bizə yazın'
        ],
        'bottomPanel' => [
            'getNews' => 'Xəbərlərdən agah ol',
            'updateInMinute' => 'Yeniliklər anında E-Mail iniə gəlsin!',
            'langs' => 'Dillər',
            'copyright' => 'Müəllif hüquqları'
        ],
    ],
    'form' => [
        'labels' => [
            'phonenumb' => 'Telefon nömrəsi',
            'password' => 'Şifrə',
            'oldpassword'=>'Əvvəlki şifrə',
            'newPassword'=>'Yeni şifrə',
            'newPassword_repeat'=>'Yeni şifrənin təkrarı',
            'forgotpass' => 'Şifrəmi unutdum',
            'name' => 'Ad',
            'email' => 'E-mail',
            'subject' => 'Mövzu',
            'desc' => 'Açıqlama',
        ],
        'inputs' => [
            'inputemail' => 'E-mail adresinizi daxil edin!',
            'inputphonenumb' => 'Telefon nömrənizi daxil edin!',
            'inputPass' => 'Şifrəni daxil edin!',
            'rememberme' => 'Məni xatırla!',
        ],
        'buttons' => [
            'send' => 'Göndər',
            'submit' => 'Abunə ol',
            'sendmessage' => 'Məktubu göndər',
            'shareComment'=>'Şərhi Bölüş',
            'reply'=>'Cavabla',
            'add'=>'Əlavə et'
        ],
        'validation'=>[
            'required'=>'Doldurmağınız önəmli!',
            'email'=>'E-mail tipində məlumat daxil edin.',
            'length'=>'Uzunluğu maksimal :len olmalıdır.',
            'lengthMin'=>'Uzunluğu minimal :len olmalıdır.',
            'emailRecorded'=>'Emailiniz qeydə alındı.',
            'emailNotRecorded'=>'Emailiniz qeydə alınmadı. :err',
            'messageSended'=>'Məktub göndərildi.',
            'messageNotSended'=>'Məktub göndərilmədi. :err',
            'commentsSended'=>'Komment göndərildi.',
            'commentsNotSended'=>'Komment göndərilmədi. :err',
            'ratingSended'=>'Reytinqiniz göndərildi.',
            'ratingNotSended'=>'Reytinqiniz göndərilmədi.',
            'searchFailed'=>'Axtarış nəticəsi tapılmadı.',
        ],
        'action'=>[
            'removed'=>'Silindi',
            'added'=>'Əlavə edildi',
            'logout'=>'Hesabınızdan çıxdınız',
        ],
    ],
    'actions' => [
        'addtocart' => 'Karta əlavə et',
        'more' => 'Daha çox',
        'shareThis' => 'Adreslərdə paylaş',
        'null'=>'Məlumat tapılmadı'
    ],
    'auth'=>[
        'notyetacc'=>'Daxil etdiyiniz nömrəyə aid hesab görünmür.',
        'error'=>'Xəta yarandı',
        'successLogin'=>'Daxil oldunuz',
    ],
];
