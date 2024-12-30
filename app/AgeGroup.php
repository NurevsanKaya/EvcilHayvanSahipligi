<?php



namespace App;

enum AgeGroup: string
{
    case ZeroMonth = '0 ay';
    case OneMonth = '1 ay';
    case TwoMonth = '2 ay';
    case ThreeMonth = '3 ay';
    case FourMonth = '4 ay';
    case FiveMonth = '5 ay';
    case SixMonth = '6 ay';
    case SevenMonth = '7 ay';
    case EightMonth = '8 ay';
    case NineMonth = '9 ay';
    case TenMonth = '10 ay';
    case ElevenMonth = '11 ay';

    case OneYear = '1 yaş';
    case TwoYear = '2 yaş';
    case ThreeYear = '3 yaş';
    case FourYear = '4 yaş';
    case FivePlusYear = '5+ yaş';

    /**
     * Kullanım için tüm değerleri dizi olarak döndürür.
     */
    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}

