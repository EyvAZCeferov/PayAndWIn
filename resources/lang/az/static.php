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
            'reply'=>'Cavabla'
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
    ],
    'actions' => [
        'addtocart' => 'Karta əlavə et',
        'more' => 'Daha çox',
        'shareThis' => 'Adreslərdə paylaş'
    ],
    'auth'=>[
        'notyetacc'=>'Daxil etdiyiniz nömrəyə aid hesab görünmür.',
        'error'=>'Xəta yarandı',
        'successLogin'=>'Daxil oldunuz',
    ],
];
