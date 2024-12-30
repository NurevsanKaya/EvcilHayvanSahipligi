<?php

namespace App;

enum Status:int
{
    case Published = 1;
    case Pending = 2;
    case Expired = 3;
    case Cancelled = 4;
    case Completed = 5;

    public function label(): string
    {
        return match ($this) {
            self::Published => 'Yayında',
            self::Pending => 'Beklemede',
            self::Expired => 'Süresi doldu',
            self::Cancelled => 'İptal edildi',
            self::Completed => 'Tamamlandı',

        };
    }

}

