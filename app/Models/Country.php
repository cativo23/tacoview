<?php

namespace App\Models;

use Database\Factories\CountryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Laravel\Scout\Searchable;

/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string|null $iso3
 * @property string|null $numeric_code
 * @property string|null $iso2
 * @property string|null $phonecode
 * @property string|null $capital
 * @property string|null $currency
 * @property string|null $currency_name
 * @property string|null $currency_symbol
 * @property string|null $tld
 * @property string|null $native
 * @property string|null $region
 * @property string|null $subregion
 * @property string|null $timezones
 * @property string|null $translations
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $emoji
 * @property string|null $emojiU
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $flag
 * @property string|null $wikiDataId Rapid API GeoDB Cities
 * @method static CountryFactory factory(...$parameters)
 * @method static Builder|Country newModelQuery()
 * @method static Builder|Country newQuery()
 * @method static Builder|Country query()
 * @method static Builder|Country whereCapital($value)
 * @method static Builder|Country whereCreatedAt($value)
 * @method static Builder|Country whereCurrency($value)
 * @method static Builder|Country whereCurrencyName($value)
 * @method static Builder|Country whereCurrencySymbol($value)
 * @method static Builder|Country whereEmoji($value)
 * @method static Builder|Country whereEmojiU($value)
 * @method static Builder|Country whereFlag($value)
 * @method static Builder|Country whereId($value)
 * @method static Builder|Country whereIso2($value)
 * @method static Builder|Country whereIso3($value)
 * @method static Builder|Country whereLatitude($value)
 * @method static Builder|Country whereLongitude($value)
 * @method static Builder|Country whereName($value)
 * @method static Builder|Country whereNative($value)
 * @method static Builder|Country whereNumericCode($value)
 * @method static Builder|Country wherePhonecode($value)
 * @method static Builder|Country whereRegion($value)
 * @method static Builder|Country whereSubregion($value)
 * @method static Builder|Country whereTimezones($value)
 * @method static Builder|Country whereTld($value)
 * @method static Builder|Country whereTranslations($value)
 * @method static Builder|Country whereUpdatedAt($value)
 * @method static Builder|Country whereWikiDataId($value)
 * @mixin Eloquent
 */
class Country extends Model
{
    use HasFactory;

    use Searchable;

    protected $guarded = [];
}
