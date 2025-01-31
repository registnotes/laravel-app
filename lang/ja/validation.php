<?php

return [

    /*
    |--------------------------------------------------------------------------
    | バリデーションの言語ライン
    |--------------------------------------------------------------------------
    |
    | 以下の言語ラインは、バリデーションクラスで使用されるデフォルトのエラーメッセージです。
    | これらのルールのいくつかはサイズルールなど、複数のバージョンを持っています。
    | 各メッセージはここで自由に調整できます。
    |
    */

    'accepted' => ':attribute は受け入れなければなりません。',
    'accepted_if' => ':attribute は :other が :value のときに受け入れなければなりません。',
    'active_url' => ':attribute は有効なURLでなければなりません。',
    'after' => ':attribute は :date より後の日付でなければなりません。',
    'after_or_equal' => ':attribute は :date と同じかそれ以降の日付でなければなりません。',
    'alpha' => ':attribute にはアルファベットのみを含めなければなりません。',
    'alpha_dash' => ':attribute にはアルファベット、数字、ハイフン、アンダースコアのみを含めなければなりません。',
    'alpha_num' => ':attribute にはアルファベットと数字のみを含めなければなりません。',
    'array' => ':attribute は配列でなければなりません。',
    'ascii' => ':attribute には半角英数字と記号のみを含めなければなりません。',
    'before' => ':attribute は :date より前の日付でなければなりません。',
    'before_or_equal' => ':attribute は :date と同じかそれ以前の日付でなければなりません。',
    'between' => [
        'array' => ':attribute は :min と :max の間のアイテム数でなければなりません。',
        'file' => ':attribute は :min と :max キロバイトの間でなければなりません。',
        'numeric' => ':attribute は :min と :max の間でなければなりません。',
        'string' => ':attribute は :min と :max の間の文字数でなければなりません。',
    ],
    'boolean' => ':attribute は true または false でなければなりません。',
    'can' => ':attribute には不正な値が含まれています。',
    'confirmed' => ':attribute の確認が一致しません。',
    'contains' => ':attribute に必要な値が含まれていません。',
    'current_password' => '現在のパスワードが間違っています。',
    'date' => ':attribute は有効な日付でなければなりません。',
    'date_equals' => ':attribute は :date と同じ日付でなければなりません。',
    'date_format' => ':attribute は :format の形式と一致しなければなりません。',
    'decimal' => ':attribute は :decimal 桁の小数を含めなければなりません。',
    'declined' => ':attribute は拒否されなければなりません。',
    'declined_if' => ':attribute は :other が :value のときに拒否されなければなりません。',
    'different' => ':attribute と :other は異なっていなければなりません。',
    'digits' => ':attribute は :digits 桁でなければなりません。',
    'digits_between' => ':attribute は :min と :max の間の桁数でなければなりません。',
    'dimensions' => ':attribute の画像サイズが無効です。',
    'distinct' => ':attribute に重複した値があります。',
    'doesnt_end_with' => ':attribute は次のいずれかで終わってはいけません: :values。',
    'doesnt_start_with' => ':attribute は次のいずれかで始まってはいけません: :values。',
    'email' => ':attribute は有効なメールアドレスでなければなりません。',
    'ends_with' => ':attribute は次のいずれかで終わっていなければなりません: :values。',
    'enum' => '選択された :attribute は無効です。',
    'exists' => '選択された :attribute は無効です。',
    'extensions' => ':attribute には次の拡張子のいずれかを含めなければなりません: :values。',
    'file' => ':attribute はファイルでなければなりません。',
    'filled' => ':attribute には値が必要です。',
    'gt' => [
        'array' => ':attribute は :value より多くのアイテムを含めなければなりません。',
        'file' => ':attribute は :value キロバイトより大きい必要があります。',
        'numeric' => ':attribute は :value より大きい必要があります。',
        'string' => ':attribute は :value 文字より長い必要があります。',
    ],
    'gte' => [
        'array' => ':attribute は :value アイテム以上でなければなりません。',
        'file' => ':attribute は :value キロバイト以上でなければなりません。',
        'numeric' => ':attribute は :value 以上でなければなりません。',
        'string' => ':attribute は :value 文字以上でなければなりません。',
    ],
    'hex_color' => ':attribute は有効な16進数の色でなければなりません。',
    'image' => ':attribute は画像でなければなりません。',
    'in' => '選択された :attribute は無効です。',
    'in_array' => ':attribute は :other に存在しなければなりません。',
    'integer' => ':attribute は整数でなければなりません。',
    'ip' => ':attribute は有効なIPアドレスでなければなりません。',
    'ipv4' => ':attribute は有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attribute は有効なIPv6アドレスでなければなりません。',
    'json' => ':attribute は有効なJSON文字列でなければなりません。',
    'list' => ':attribute はリストでなければなりません。',
    'lowercase' => ':attribute は小文字でなければなりません。',
    'lt' => [
        'array' => ':attribute は :value より少ないアイテムを含めなければなりません。',
        'file' => ':attribute は :value キロバイトより小さい必要があります。',
        'numeric' => ':attribute は :value より小さい必要があります。',
        'string' => ':attribute は :value 文字より短い必要があります。',
    ],
    'lte' => [
        'array' => ':attribute は :value アイテム以下でなければなりません。',
        'file' => ':attribute は :value キロバイト以下でなければなりません。',
        'numeric' => ':attribute は :value 以下でなければなりません。',
        'string' => ':attribute は :value 文字以下でなければなりません。',
    ],
    'mac_address' => ':attribute は有効なMACアドレスでなければなりません。',
    'max' => [
        'array' => ':attribute は :max アイテム以下でなければなりません。',
        'file' => ':attribute は :max キロバイト以下でなければなりません。',
        'numeric' => ':attribute は :max 以下でなければなりません。',
        'string' => ':attribute は :max 文字以下でなければなりません。',
    ],
    'max_digits' => ':attribute は :max 桁以下でなければなりません。',
    'mimes' => ':attribute は次の種類のファイルでなければなりません: :values。',
    'mimetypes' => ':attribute は次の種類のファイルでなければなりません: :values。',
    'min' => [
        'array' => ':attribute は少なくとも :min アイテムでなければなりません。',
        'file' => ':attribute は少なくとも :min キロバイトでなければなりません。',
        'numeric' => ':attribute は少なくとも :min でなければなりません。',
        'string' => ':attribute は少なくとも :min 文字でなければなりません。',
    ],
    'min_digits' => ':attribute は少なくとも :min 桁でなければなりません。',
    'missing' => ':attribute は欠けている必要があります。',
    'missing_if' => ':attribute は :other が :value のときに欠けている必要があります。',
    'multiple_of' => ':attribute は :value の倍数でなければなりません。',
    'not_in' => '選択された :attribute は無効です。',
    'not_regex' => ':attribute の形式が無効です。',
    'numeric' => ':attribute は数字でなければなりません。',
    'password' => 'パスワードが間違っています。',
    'present' => ':attribute は存在しなければなりません。',
    'prohibited' => ':attribute は禁止されています。',
    'prohibited_if' => ':attribute は :other が :value のときに禁止されています。',
    'prohibited_unless' => ':attribute は :other が :values のときに禁止されています。',
    'regex' => ':attribute の形式が無効です。',
    'required' => ':attribute は必須です。',
    'required_if' => ':attribute は :other が :value のときに必須です。',
    'required_unless' => ':attribute は :other が :values のときに必須です。',
    'required_with' => ':attribute は :values が存在する場合に必須です。',
    'required_with_all' => ':attribute は :values がすべて存在する場合に必須です。',
    'required_without' => ':attribute は :values が存在しない場合に必須です。',
    'required_without_all' => ':attribute は :values がすべて存在しない場合に必須です。',
    'same' => ':attribute と :other は一致しなければなりません。',
    'size' => [
        'array' => ':attribute は :size アイテムでなければなりません。',
        'file' => ':attribute は :size キロバイトでなければなりません。',
        'numeric' => ':attribute は :size でなければなりません。',
        'string' => ':attribute は :size 文字でなければなりません。',
    ],
    'starts_with' => ':attribute は次のいずれかで始まらなければなりません: :values。',
    'string' => ':attribute は文字列でなければなりません。',
    'timezone' => ':attribute は有効なタイムゾーンでなければなりません。',
    'unique' => ':attribute はすでに存在します。',
    'uploaded' => ':attribute のアップロードに失敗しました。',
    'url' => ':attribute は有効なURLでなければなりません。',
    'uuid' => ':attribute は有効なUUIDでなければなりません。',








    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ],
];
